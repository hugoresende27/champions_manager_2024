<?php

namespace App\Http\Controllers;

use App\Models\Championship;
use App\Models\Country;
use App\Models\Game;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            Auth::logout();
        }

        return view('index');
    }

    public function startGame()
    {
        // $countries = Country::join('teams', 'countries.id', '=', 'teams.country_id')
        //             ->join('players', 'teams.id', '=', 'players.team_id')
        //             ->select('countries.*')
        //             ->groupBy('countries.id') // Group by country to avoid duplicate countries
        //             ->get();

        $countries = Country::join('teams', 'countries.id', '=', 'teams.country_id')
            ->join('players', 'teams.id', '=', 'players.team_id')
            ->select('countries.*', \DB::raw('count(players.id) as player_count'))  // Count players per team
            ->groupBy('countries.id')  // Group by country and team for accurate count
            ->having('player_count', '>', 10)  // Filter countries with teams exceeding 10 players
            ->get();

        // $countries = Country::all();


        return view('startgame', compact('countries'));
    }


    public function savedGames()
    {
        $loads = User::all();
        return view('loadgame', compact('loads'));
    }
    public function deleteGames(Request $request)
    {
        $pathInfo = $request->path(); // Get the path of the request URL
        $segments = explode('/', $pathInfo); // Split the path into segments
        $gameId = end($segments); // Retrieve the last segment (which contains the game ID)

       
        User::where('game_id', $gameId)->delete();
        Championship::where('game_id', $gameId)->delete();
        Game::where('id', $gameId)->delete();

        $loads = User::all();
        return view('loadgame', compact('loads'));
    }
  

    
}
