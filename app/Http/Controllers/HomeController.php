<?php

namespace App\Http\Controllers;

use App\Models\Country;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function startGame()
    {
        $countries = Country::all();
        return view('startgame', compact('countries'));
    }

    
}
