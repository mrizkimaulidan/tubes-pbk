<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CoffeeRecommendationController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyQuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/rekomendasi', CoffeeRecommendationController::class)->name('rekomendasi.index');

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::resource('/kopi', CoffeeController::class)->parameter('kopi', 'coffee');

Route::resource('/kriteria', CriteriaController::class)->parameter('kriteria', 'criteria');

Route::resource('/pengguna', UserController::class)->parameter('pengguna', 'user');

Route::resource('/pertanyaan', SurveyQuestionController::class)->parameter('pertanyaan', 'question');
