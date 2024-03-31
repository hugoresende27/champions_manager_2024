<?php

namespace App\Services;
use App\Models\Game;

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


    
    public static function userTeamId(): int
    {
        return auth()->user()->team_id;
    }
}