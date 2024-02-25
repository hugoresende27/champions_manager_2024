<?php

namespace Database\Seeders\API;
use App\Models\Country;
use App\Models\Player;
use App\Models\Team;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Faker\Factory as Faker;

class ApiFootballData
{


    //https://www.football-data.org/

    private function getApiData()
    {
        return ['token' => env('FOOTBALL_API_DATA_TOKEN'), 'url' => env('FOOTBALL_API_DATA_URL','')];
    }

    // Function to make API requests
    private function makeApiRequest(string $url)
    {
        $apiData = $this->getApiData();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $apiData['url'] . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'X-Auth-Token: ' . $apiData['token']
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $jsonResponse = json_decode($response);
        return $jsonResponse;
    }

    public function getLeaguesDataApi()
    {
        // $jsonResponse = $this->makeApiRequest('competitions/');
        // $arrayLeagues = $jsonResponse->competitions ?? null;

       
        // if (is_null($arrayLeagues)) {
        //     dd('API bad response, no competitions in the array');
        // }
        $arrayLeagues = ['BSA', 'PL', 'PPL', 'PD', 'DED', 'SA', 'BL1', 'FL1'];
        foreach($arrayLeagues as $league) {
            // $this->getTeamsDataApi($league->code);
            $this->getTeamsDataApi($league);
        }
    }




    public function getTeamsDataApi(string $league)
    {
        $jsonResponse = $this->makeApiRequest('competitions/' . $league . '/teams');
        $arrayTeams = $jsonResponse->teams ?? null;

        if (is_null($arrayTeams)) {
            dd('API bad response, no teams in the array', $jsonResponse);
        }

        foreach ($arrayTeams as $team) {
       
            $country = Country::where('name', $team->area->name)->first();


            Team::updateOrCreate(
                ['api_external_id' => $team->id],
                [
                'address' => $team->address,
                'name' => $team->name,
                'shortname' => $team->shortName,
                'website' => $team->website,
                'colors' => $team->clubColors,
                'code' => $team->tla ?? strtoupper(substr($team->name,0,3)),
                'funding_year' => $team->founded ?? date('Y'),
                'country_id' => $country->id,
                'flag' => $team->crest,
                'api_external_id' => $team->id
            ]);
        }
    }

    public function getPlayersDataApi(int $apiTeamId, int $teamId)
    {
        $jsonResponse = $this->makeApiRequest('teams/' . $apiTeamId );
        $arraySquad = $jsonResponse->squad ?? null;

        if (is_null($arraySquad)) {
            dd('API bad response, no squad in the array', $jsonResponse);
        }

        $faker = Faker::create();

        foreach ($arraySquad as $player) {

            $country = Country::where('name', $player->nationality)->first();

            // if (is_null($country)) dd($player);

            $shortName = explode(' ',$player->name)[0];
            
            Player::updateOrCreate(
                ['api_external_id' => $player->id],
                [
                'name' => $player->name,
                'shortname' => $shortName,
                'salary' => $faker->numberBetween(1000, 999999),
                'position' => strtolower($player->position),
                'city_of_birth' =>  $faker->city,
                'birth_date' =>  $player->dateOfBirth,
                'team_id' => $teamId,
                'country_id' => $country->id ?? 12,
                'side' => $faker->randomElement(['Center', 'Left', 'Right']),
                'api_external_id' => $player->id
            ]);
        }
    }

}