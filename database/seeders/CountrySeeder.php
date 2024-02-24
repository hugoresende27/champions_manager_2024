<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define an array of countries
        $countries = [
            ['name' => 'Portugal', 'code' => 'PT'],
            ['name' => 'France', 'code' => 'FR'],
            ['name' => 'Spain', 'code' => 'ES'],
            ['name' => 'United Kingdom', 'code' => 'UK'],
            ['name' => 'Germany', 'code' => 'DE'],
            ['name' => 'Italy', 'code' => 'IT'],
            // Add more countries as needed
        ];

        // Loop through the countries array and create records in the countries table
        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
