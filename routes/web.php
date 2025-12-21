<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CoffeeRecommendationController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SurveyQuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::get('/rekomendasi', CoffeeRecommendationController::class)->name('rekomendasi.index');
Route::post('/rekomendasi', [CoffeeRecommendationController::class, 'calculate'])->name('rekomendasi.calculate');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('/kopi', CoffeeController::class)->parameter('kopi', 'coffee');
    Route::post('/kopi/import', [CoffeeController::class, 'import'])->name('kopi.import');

    Route::resource('/kriteria', CriteriaController::class)->parameter('kriteria', 'criteria');
    Route::resource('/pengguna', UserController::class)->parameter('pengguna', 'user');
    Route::resource('/pertanyaan', SurveyQuestionController::class)->parameter('pertanyaan', 'question');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
});
