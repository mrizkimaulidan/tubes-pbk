<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionOption extends Model
{
    public function SurveyQuetion()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
