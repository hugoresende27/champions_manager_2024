<?php

namespace Database\Seeders;

use App\Models\Player;
use Database\Factories\PlayerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Player::factory()->create();
    }
}
