<?php

namespace App\Http\Controllers;

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
}
