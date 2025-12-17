<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

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
        // dd($request->answers);
        $request->validate([
            'answers' => 'required|array'
        ]);

        // 1. Bobot dari user
        $answers = $request->answers;

        // 2. Normalisasi bobot
        $totalWeight = array_sum($answers);
        $weights = [];

        foreach ($answers as $criteria_id => $value) {
            // dump($criteria_id);
            $weights[$criteria_id] = $value / $totalWeight;
        }

        // 3. Kriteria COST
        $costCriteria = [1]; // kriteria harga

        $coffees = Coffee::all();
        $scores = [];
        $totalS = 0;

        //    4. Hitung Vektor S
        foreach ($coffees as $coffee) {
            $S = 1;

            foreach ($weights as $criteria_id => $weight) {
                $nilai = $coffee->getCriteriaValue($criteria_id);

                // COST → dibalik (1/x)
                if (in_array($criteria_id, $costCriteria)) {
                    $nilai = 1 / $nilai;
                }

                $S *= pow($nilai, $weight);
            }

            $scores[] = [
                'coffee' => $coffee,
                'S' => $S
            ];

            $totalS += $S;
        }

        // 5. Hitung Vektor V
        foreach ($scores as $key => $item) {
            $scores[$key]['score'] = $item['S'] / $totalS;
        }

        // 6. Ranking
        usort($scores, fn($a, $b) => $b['score'] <=> $a['score']);

        // 7. Kirim ke View
        $SurveyQuestion = SurveyQuestion::with('surveyQuestionOptions')->get();

        return view('recommendation', compact('SurveyQuestion', 'scores'));
    }
}
