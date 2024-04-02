<?php

namespace Database\Seeders\API;
use App\Jobs\SeedDatabasePlayersJob;
use App\Jobs\SeedDatabaseTeamsJob;
use App\Models\Country;
use App\Models\Player;
use App\Models\Team;
use Faker\Factory as Faker;
use Log;

class ApiFootballData
{


    //https://www.football-data.org/

    /**
     * [getApiData]
     * function to get api data from env
     * token and url
     * @return [type]
     */
    private function getApiData()
    {
        return ['token' => env('FOOTBALL_API_DATA_TOKEN'), 'url' => env('FOOTBALL_API_DATA_URL','')];
    }


    /**
     * [makeApiRequest]
     * api request function
     * sleep(5) before call to process massive calls
     * @param string $url
     * @return [type]
     */
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

        sleep(5);
        $response = curl_exec($curl);

        curl_close($curl);

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        Log::channel('football_data_api')->info('Response status : '.$httpCode. ' url : '.$url);

        $jsonResponse = json_decode($response);
        return $jsonResponse;
    }



    /**
     * [createJobsToGetLeaguesDataApi]
     * @return [type]
     */
    public function createJobsToGetLeaguesDataApi()
    {
        // $jsonResponse = $this->makeApiRequest('competitions/');
        // $arrayLeagues = $jsonResponse->competitions ?? null;

       
        // if (is_null($arrayLeagues)) {
        //     dd('API bad response, no competitions in the array');
        // }

        $arrayLeagues = ['BSA', 'ELC', 'PL', 'FL1',  'BL1',  'SA', 'DED', 'PPL'];
        foreach($arrayLeagues as $league) {
     
            // SeedDatabaseTeamsJob::dispatch($league->code);
            SeedDatabaseTeamsJob::dispatch($league);
        }

        
    }

    
    /**
     * [createJobsToGetPlayersDataApi]
     * @return [type]
     */
    public function createJobsToGetPlayersDataApi()
    {

        $teams = Team::all();
        foreach($teams as $team) {
         
            SeedDatabasePlayersJob::dispatch($team->api_external_id, $team->id);
        }

    }




    public function fillTeamsDataApi(string $league): array
    {
        $jsonResponse = $this->makeApiRequest('competitions/' . $league . '/teams');
        $arrayTeams = $jsonResponse->teams ?? null;

        if (is_null($arrayTeams)) {
            return [];
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

        return $arrayTeams;
    }

    public function fillPlayersDataApi(int $apiTeamId, int $teamId)
    {
        $jsonResponse = $this->makeApiRequest('teams/' . $apiTeamId );
        $arraySquad = $jsonResponse->squad ?? null;

        if (is_null($arraySquad)) {
            return;
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
                'salary' => $faker->numberBetween(100, 999) * 100,
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