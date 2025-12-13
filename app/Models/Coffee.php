<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'taste',
        'intensity',
        'sweetness',
        'milk_level',
        'beans_type',
        'image_url',
    ];
}
