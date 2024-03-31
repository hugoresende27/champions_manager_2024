<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Player;
use App\Models\Team;
use App\Services\GameService;
use Database\Seeders\API\ApiFootballData;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
class ApiController extends Controller
{

    public function getCurrentGameDay(Request $request, $game_id)
    {
        return GameService::currentGameDay((int)$game_id);
    }


    public function getTeamsByCountry(int $countryId)
    {
        // $teams = Team::where('country_id', $countryId)->get();
        $teams = Team::join('players', 'teams.id','=','players.team_id')
                        ->havingRaw('COUNT(players.id) > ?', [10])  
                        ->where('players.country_id', $countryId)
                        ->groupBy('teams.id') 
                        ->get('teams.*');

                        // dd($teams);
        return response()->json($teams);
    }


    public function getTeamsById(int $id)
    {
        $team = Team::where('id', $id)->first();
        return response()->json($team);
    }


    public function getPlayersById(int $id)
    {
        $player = Player::where('id', $id)->first();
        return response()->json($player);
    }


    public function getPlayersByTeamId(int $id)
    {
        $player = Player::where('team_id', $id)->get();
        return response()->json($player);
    }


    public function getPlayersByCountryId(int $id)
    {
        $player = Player::where('country_id', $id)->get();
        return response()->json($player);
    }


    
    public function seedPlayers()
    {
        $api = new ApiFootballData;

        $api->createJobsToGetPlayersDataApi(); 

        return view ('index');

    }



    public function seedTeams()
    {
        $api = new ApiFootballData;

        $api->createJobsToGetLeaguesDataApi();

        return view ('index');
 
    }

    public function seedCountries() 
    { 
        $jsonFilePath = public_path('assets/countries_list.json');

        $jsonString = File::get($jsonFilePath);
        $countriesArray = json_decode($jsonString, true);

        foreach ($countriesArray as $country) {
            Country::updateOrCreate($country);
        }

        return view('index');
    }
}
