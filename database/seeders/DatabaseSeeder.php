<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@material.com',
        //     'password' => ('secret')
        // ]);

        $this->call(CountrySeeder::class);
        $this->call(TeamSeeder::class);
        // $this->call(PlayerSeeder::class);
        $allTeams = Team::all();
        foreach ($allTeams as $team) {
  
            Player::factory(30)->create(['team_id' => $team->id]);
        }
    }
}
