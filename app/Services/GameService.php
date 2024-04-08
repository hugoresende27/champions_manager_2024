<?php

namespace App\Services;
use App\Models\Calendar;
use App\Models\CoachSetting;
use App\Models\Enum\BalanceEnum;
use App\Models\Enum\TacticEnum;
use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class GameService
{


    /**
     * [newGame]
     * @return bool
     */
    public function newGame(int $teamId): ?int
    {

        $game = Game::create([
                                'team_id' => $teamId,
                                'current_date' => '2024-06-01',
                            ]);
        $game->save();


        return $game->id ?? null;
    }


    public function newGameCoachSettings(int $userId, int $teamId, int $gameId): void
    {

        
        $coachingSettings = CoachSetting::create([
                                'team_id' => $teamId,
                                'user_id' => $userId,
                                'game_id' => $gameId,
                                'trainning' => 1,
                                'tactics_wings' => true,
                                'man_marking' => true,
                                'smooth' => true,
                                'balance' => BalanceEnum::BALANCE_ATTACK,
                                'tactic' => TacticEnum::FOUR_FOUR_TWO,
                            ]);
        $coachingSettings->save();


    }


    
    public static function userTeamId(): int
    {
        return auth()->user()->team_id;
    }


    public static function userGameId(): int
    {
        return auth()->user()->game_id;
    }


    public static function userTeamName(): Team
    {
        return Team::where('id', self::userTeamId())->first();
    }



    public static function currentGameDay(?int $gameId = null): ?string
    {
      
        if (is_null($gameId)) {
            $gameId = auth()->user()->game_id;
        }
        return Game::where('id', $gameId)->value('current_date');
    }
    public static function allMonthMatchesDays(?int $gameId = null, ?int $teamId = null): Collection
    {
      
        if (is_null($gameId)) {
            $gameId = auth()->user()->game_id;
        }
        if (is_null($teamId)) {
            $teamId = auth()->user()->team_id ?? Game::where('id', $gameId)->value('team_id');
        }
        $gameDate = self::currentGameDay($gameId);
        $gameDateObject = new \DateTime($gameDate);
        $currentMonth = $gameDateObject->format('m');
        return Calendar::where('game_id', $gameId)
            ->where('home_team_id', $teamId)
            ->whereMonth('game_date', $currentMonth)
            ->get();
    }


    public static function nextOneDay(): bool
    {
        
        $game = Game::where('id', self::userGameId())->first();

        $currentDate = Carbon::parse($game->current_date);

        $nextDay = $currentDate->addDay();

        $game->update(['current_date' => $nextDay]);

        return true;
    }


}