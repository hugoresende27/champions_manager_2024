<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Player;
use App\Models\Team;
use Database\Seeders\API\ApiFootballData;
use Illuminate\Support\Facades\File;
class ApiController extends Controller
{

    public function getTeamsByCountry(int $countryId)
    {
        $teams = Team::where('country_id', $countryId)->get();
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
