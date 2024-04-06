<?php

namespace App\Http\Repositories;
use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CalendarRepository
{

    public function insertCalendarRecordForChampionship(
                                                        int $homeTeamId, 
                                                        int $awayTeamId, 
                                                        int $gameId, 
                                                        Carbon $gameDate, 
                                                        int $championshipId, 
                                                        int $userId,
                                                        int $weeks): void
    {

        
        // Create the corresponding calendar entry
            Calendar::updateOrCreate(
                [
                    'game_date' => (string)$gameDate,
                    'home_team_id' => $homeTeamId,
                    'away_team_id' => $awayTeamId,
                    'game_id' => $gameId,
                    'championship_id' => $championshipId,
                    'user_id' => $userId,
                ],
                [
                    'game_date' => (string)$gameDate,
                    'home_team_id' => $homeTeamId,
                    'away_team_id' => $awayTeamId,
                    'game_id' => $gameId,
                    'championship_id' => $championshipId,
                    'user_id' => $userId,
                ]);
    }




    private function getNextSaturdayOrSunday(Carbon $date)
    {
        // Get next Saturday or Sunday
        while (!in_array($date->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY])) {
            $date->addDay();
        }
        return $date;
    }
}