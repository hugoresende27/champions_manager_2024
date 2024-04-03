<?php

namespace App\Http\Repositories;
use App\Models\Calendar;


class CalendarRepository
{

    public function insertCalendarRecordForChampionship(
                                                        int $homeTeamId, 
                                                        int $awayTeamId, 
                                                        int $gameId, 
                                                        string $gameDate, 
                                                        int $championshipId, 
                                                        int $userId): void
    {
        // Create the corresponding calendar entry
            Calendar::updateOrCreate(
                [
                    'game_date' => $gameDate,
                    'home_team_id' => $homeTeamId,
                    'away_team_id' => $awayTeamId,
                    'game_id' => $gameId,
                    'championship_id' => $championshipId,
                    'user_id' => $userId,
                ],
                [
                    'game_date' => $gameDate,
                    'home_team_id' => $homeTeamId,
                    'away_team_id' => $awayTeamId,
                    'game_id' => $gameId,
                    'championship_id' => $championshipId,
                    'user_id' => $userId,
                ]);
    }
}