<?php

namespace App\Http\Repositories;
use App\Models\Championship;


class ChampionshipRepository
{

    public function insertTeamRecordForChampionship(object $team, int $totalTeams): void
    {
        // Create a new championship game record
        Championship::create([
            'country_id' => $team->country_id,
            'team_id' => $team->id,
            'total_games' => $totalTeams * 2, 
            // Other game statistics can be initialized as needed
        ]);
    }
}