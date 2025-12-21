<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class CoffeeRecommendationController extends Controller
{
    protected $surveyQuestions;

    public function __construct()
    {
        $this->surveyQuestions = SurveyQuestion::with('surveyQuestionOptions')->get();
    }

    /**
     * Display the recommendation form
     */
    public function __invoke(Request $request)
    {
        return view('recommendation', [
            'surveyQuestions' => $this->surveyQuestions,
            'coffees' => collect(),
        ]);
    }

    /**
     * Calculate and show recommendations
     */
    public function calculate(Request $request)
    {
        $userWeights = $request->answers;
        $totalWeight = array_sum($userWeights);

        $coffeeData = Coffee::all()->map(function ($coffee) {
            return [
                'id' => $coffee->id,
                'name' => $coffee->name,
                'original' => [
                    'taste' => $coffee->taste,
                    'intensity' => $coffee->intensity,
                    'price' => $coffee->price,
                    'sweetness' => $coffee->sweetness,
                    'milk_level' => $coffee->milk_level,
                ],
                'mapped' => [
                    'taste' => $coffee->mapTaste($coffee->taste),
                    'intensity' => $coffee->mapIntensity($coffee->intensity),
                    'price' => $coffee->mapPrice($coffee->price),
                    'sweetness' => $coffee->mapSweetness($coffee->sweetness),
                    'milk_level' => $coffee->mapMilkLevel($coffee->milk_level),
                ],
                'price' => $coffee->price,
                'description' => $coffee->description,
                'beans_type' => $coffee->beans_type,
            ];
        });

        $totalScore = 0;
        $coffeeData = $coffeeData->map(function ($item) use ($userWeights, $totalWeight, &$totalScore) {
            $score = pow($item['mapped']['taste'], $userWeights[0] / $totalWeight)
                * pow($item['mapped']['intensity'], $userWeights[1] / $totalWeight)
                * pow($item['mapped']['price'], -($userWeights[2] / $totalWeight))
                * pow($item['mapped']['sweetness'], $userWeights[3] / $totalWeight)
                * pow($item['mapped']['milk_level'], $userWeights[4] / $totalWeight);

            $item['S'] = round($score, 4);
            $totalScore += $item['S'];

            return $item;
        });

        $coffeeData = $coffeeData->map(function ($item) use ($totalScore) {
            $item['V'] = round($item['S'] / $totalScore, 6);
            $item['percentage'] = round($item['V'] * 100, 2);

            return $item;
        });

        $coffeeData = $coffeeData->sortByDesc('V')->values();

        $coffeeData = $coffeeData->map(function ($item, $index) {
            $item['rank'] = $index + 1;

            return $item;
        });

        return view('recommendation', [
            'surveyQuestions' => $this->surveyQuestions,
            'coffees' => $coffeeData->take(6),
            'total_S' => round($totalScore, 4),
            'user_weights' => $userWeights,
            'normalized_weights' => array_map(function ($weight) use ($totalWeight) {
                return round($weight / $totalWeight, 4);
            }, $userWeights),
        ]);
    }
}
