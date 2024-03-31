<?php

namespace App\Http\Repositories;
use App\Models\Championship;


class ChampionshipRepository
{

    public function insertTeamRecordForChampionship(object $team, int $totalTeams, int $gameId): void
    {
        // Create a new championship game record
        $championship = Championship::create([
            'country_id' => $team->country_id,
            'team_id' => $team->id,
            'total_games' => $totalTeams * 2, 
            'game_id' => $gameId, 
            // Other game statistics can be initialized as needed
        ]);
    }
}