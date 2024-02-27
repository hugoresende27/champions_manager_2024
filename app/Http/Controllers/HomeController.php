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
        $countries = Country::join('teams', 'countries.id', '=', 'teams.country_id')
                    ->join('players', 'teams.id', '=', 'players.team_id')
                    ->select('countries.*')
                    ->distinct('countries.id')
                    ->get();

        // $countries = Country::all();


        return view('startgame', compact('countries'));
    }

    
}
