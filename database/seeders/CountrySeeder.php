<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = public_path('assets/countries_list.json');

        $jsonString = File::get($jsonFilePath);
        $countriesArray = json_decode($jsonString, true);

        foreach ($countriesArray as $country) {
            Country::create($country);
        }
    }
}
