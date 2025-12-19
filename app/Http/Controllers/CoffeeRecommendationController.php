<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoffeeRecommendationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $SurveyQuestion = SurveyQuestion::with('surveyQuestionOptions')->get();

        return view('recommendation', compact('SurveyQuestion'));
    }

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
            // Calculate weighted score (S)
            $score = pow($item['mapped']['taste'], $userWeights[0] / $totalWeight)
                * pow($item['mapped']['intensity'], $userWeights[1] / $totalWeight)
                * pow($item['mapped']['price'], - ($userWeights[2] / $totalWeight))
                * pow($item['mapped']['sweetness'], $userWeights[3] / $totalWeight)
                * pow($item['mapped']['milk_level'], $userWeights[4] / $totalWeight);

            $item['S'] = round($score, 4);
            $totalScore += $item['S'];

            return $item;
        });

        // Calculate preference value (V) for each coffee
        $coffeeData = $coffeeData->map(function ($item) use ($totalScore) {
            // V = S_i / total S
            $item['V'] = round($item['S'] / $totalScore, 6);

            // Percentage form
            $item['percentage'] = round($item['V'] * 100, 2);

            return $item;
        });

        // Sort by V (descending) for ranking
        $coffeeData = $coffeeData->sortByDesc('V')->values();

        // Add rank to each coffee
        $coffeeData = $coffeeData->map(function ($item, $index) {
            $item['rank'] = $index + 1;
            return $item;
        });

        // Get survey questions for the view
        $SurveyQuestion = SurveyQuestion::with('surveyQuestionOptions')->get();

        return view('recommendation', [
            'coffees' => $coffeeData->take(6),
            'total_S' => round($totalScore, 4),
            'SurveyQuestion' => $SurveyQuestion,
            'user_weights' => $userWeights,
            'normalized_weights' => array_map(function ($weight) use ($totalWeight) {
                return round($weight / $totalWeight, 4);
            }, $userWeights)
        ]);
    }
}
