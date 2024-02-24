<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;

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
}
