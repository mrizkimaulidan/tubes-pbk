<?php

use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::get('/kopi', [CoffeeController::class, 'index'])->name('coffees.index');
