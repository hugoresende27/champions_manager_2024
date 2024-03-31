<?php

namespace App\Http\Repositories;
use App\Models\User;


class UserRepository
{

    public function createGameUser(int $teamId, string $emailGenerated, string $playerName, int $gameId): User
    {
                // Create the admin user
         return User::firstOrCreate(
                    [
              
                        'email' => $emailGenerated,
                        'team_id' =>  $teamId,
                        'game_id' => $gameId
    
                    ],
                    [
                        'name' => $playerName,
                        'email' => $emailGenerated,
                        'password' => bcrypt('secret'),
                        'team_id' =>  $teamId,
                        'game_id' => $gameId
                    ]
                );
    }
}