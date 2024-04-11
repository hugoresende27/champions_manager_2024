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

        $gameDate = $this->getNextSaturdayOrSunday($gameDate);
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

    public function checkIfGameExist(int $gameId, int $teamId, $currentDate): Collection
    {
        return Calendar::where([
            'game_id' => $gameId,
            'game_date' => $currentDate,
        ])->where(function($query) use ($teamId) {
            $query->where('home_team_id', $teamId)
                ->orWhere('away_team_id', $teamId);
        })->get();
        
    }
}