<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $coffeeCount = Coffee::count();
        $userCount = User::count();

        return view('dashboard', compact('coffeeCount', 'userCount'));
    }
}
