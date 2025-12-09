<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\SurveyQuestion;
use Illuminate\Http\Request;

class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surveyQuestions = SurveyQuestion::paginate(10);
        $criterias = Criteria::all();

        return view('survey_questions.index', compact('surveyQuestions', 'criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SurveyQuestion::create($request->all());

        return redirect()->route('pertanyaan.index')->with('success', 'Data pertanyaan berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SurveyQuestion $surveyQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SurveyQuestion $question)
    {
        $question->delete();

        return redirect()->route('pertanyaan.index')->with('success', 'Data pertanyaan berhasil dihapus!');
    }
}
