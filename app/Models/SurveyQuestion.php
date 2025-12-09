<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $fillable = ['criteria_id', 'content', 'locale', 'sort_order'];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function surveyQuestionOptions()
    {
        return $this->hasMany(SurveyQuestionOption::class);
    }
}
