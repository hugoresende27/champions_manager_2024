<?php

namespace Database\Seeders\API;
use App\Models\Country;
use App\Models\Team;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class ApiFootballData
{


    private function getApiData()
    {
        return ['token' => env('FOOTBALL_API_DATA_TOKEN'), 'url' => env('FOOTBALL_API_DATA_URL','')];
    }
    public function getTeamsDataApi()
    {
        $apiData = $this->getApiData();
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $apiData['url'].'competitions/PPL/teams',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'X-Auth-Token: '.$apiData['token']
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        $jsonResponse = json_decode($response);
        $arrayTeams = $jsonResponse->teams ?? null;

        if (is_null($arrayTeams)) {
            dd('api bad response, no teams on array');
        }
        
        foreach($arrayTeams as $team) {
         
            $country = Country::where('name',$team->area->name)->first();
  
            Team::firstOrCreate([
                                    'address' => $team->address
                                ],
                                [
                                    'address' => $team->address,
                                    'name' => $team->name,
                                    'shortname' => $team->shortName,
                                    'website' => $team->website,
                                    'colors' => $team->clubColors,
                                    'code' => $team->tla,
                                    'funding_year' => $team->founded,
                                    'country_id' => $country->id,
                                    'flag' => $team->crest
                                ]);

        }
    }
}