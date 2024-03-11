<?php

namespace App\Http\Repositories;
use App\Models\User;


class UserRepository
{

    public function createAdminUser(int $teamId, string $emailGenerated, string $playerName): User
    {
                // Create the admin user
         return User::firstOrCreate(
                    [
              
                        'email' => $emailGenerated,
                        'about' =>  $teamId
    
                    ],
                    [
                        'name' => $playerName,
                        'email' => $emailGenerated,
                        'password' => bcrypt('secret'),
                        'about' =>  $teamId
                    ]
                );
    }
}