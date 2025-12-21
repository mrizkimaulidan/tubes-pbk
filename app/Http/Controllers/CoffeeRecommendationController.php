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
        $criteriaWeights = $request->answers;
        $totalWeight = array_sum($criteriaWeights);
        $normalizedWeights = array_map(fn ($weight) => $weight / $totalWeight, $criteriaWeights);

        // Get coffee data with mapped attributes
        $coffees = Coffee::all()->each->append('formatted_price', 'mapped_coffee_characteristics');

        $totalAlternativeScore = 0;

        // Calculate Weighted Product score for each alternative (coffee)
        $coffees = $coffees->map(function ($coffee) use ($normalizedWeights, &$totalAlternativeScore) {
            $mappedValues = $coffee->mapped_coffee_characteristics;

            // Weighted Product Formula: S_i = ∏(x_ij)^w_j
            // where:
            //   S_i = score for alternative i
            //   x_ij = normalized value of criterion j for alternative i
            //   w_j = weight of criterion j
            //   For cost criteria (price): use negative exponent

            $alternativeScore = pow($mappedValues['taste'], $normalizedWeights[0])
                * pow($mappedValues['intensity'], $normalizedWeights[1])
                * pow($mappedValues['price'], -$normalizedWeights[2])  // Cost criteria
                * pow($mappedValues['sweetness'], $normalizedWeights[3])
                * pow($mappedValues['milk_level'], $normalizedWeights[4]);

            $coffee->weighted_product_score = round($alternativeScore, 4);
            $totalAlternativeScore += $coffee->weighted_product_score;

            return $coffee;
        });

        // Calculate Preference Value (V_i = S_i / ∑S_i) and ranking
        $coffees = $coffees
            ->sortByDesc('weighted_product_score')
            ->values()
            ->map(function ($coffee, $rankIndex) use ($totalAlternativeScore) {
                // Preference Value: V_i = S_i / ∑S_i
                $coffee->preference_value = round($coffee->weighted_product_score / $totalAlternativeScore, 6);

                // Convert to percentage for display
                $coffee->match_percentage = round($coffee->preference_value * 100, 2);

                // Ranking (1-based index)
                $coffee->rank = $rankIndex + 1;

                return $coffee;
            });

        return view('recommendation', [
            'surveyQuestions' => $this->surveyQuestions,
            'coffees' => $coffees->take(6),
        ]);
    }
}
