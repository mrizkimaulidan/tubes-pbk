<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::resource('/kopi', CoffeeController::class)->parameter('kopi', 'coffee');

Route::resource('/kriteria', CriteriaController::class)->parameter('kriteria', 'criteria');
