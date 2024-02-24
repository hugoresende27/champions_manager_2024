<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Team;

class ApiController extends Controller
{
    public function getTeamsByCountry(int $countryId)
    {
        $teams = Team::where('country_id', $countryId)->get();
        return response()->json($teams);
    }
}
