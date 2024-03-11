<?php

namespace App\Http\Repositories;
use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;


class TeamRepository
{

    public function getTeamById(int $teamId)
    {
        return Team::where(['id' => $teamId])->firstOrFail();
    }


    public function getAllTeamsByCountryId(int $countryId): Collection
    {
        return Team::where(['country_id' => $countryId])->get();
    }
}