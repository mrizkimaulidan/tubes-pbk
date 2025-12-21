<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $coffees = Coffee::inRandomOrder()->take(3)->get();

        return view('welcome', compact('coffees'));
    }
}
