<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Database\Seeders\API\ApiFootballData;
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



        // $this->call(CountrySeeder::class);
        // $api = new ApiFootballData;
        // $api->createJobsToGetLeaguesDataApi();
        // $api->createJobsToGetPlayersDataApi();

        $allTeams = Team::all();
        foreach ($allTeams as $team) {
  
            $playerCount = count($team->players);
            $playersToAdd = max(20 - $playerCount, 0); // Determine how many players to add to reach 20
            if ($playersToAdd > 0) {
                Player::factory($playersToAdd)->create(['team_id' => $team->id]);
            }
          
        }

        //  User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@material.com',
        //     'password' => ('secret')
        // ]);


        // $this->call(TeamSeeder::class);
        // $this->call(PlayerSeeder::class);
      
      


 

        // $teams = Team::where('country_id', '<>', 31)->get();
        // foreach($teams as $team) {

        //     $api->getPlayersDataApi($team->api_external_id, $team->id); 
        //     sleep(5);
        // }

        
    }
}
