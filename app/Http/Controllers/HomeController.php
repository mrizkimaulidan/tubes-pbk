<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $SurveyQuestion = SurveyQuestion::with('surveyQuestionOptions')->get();

        return view('home', compact('SurveyQuestion'));
    }
}
