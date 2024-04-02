<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fullName = $this->faker->name();
        $firstName = explode(' ',$fullName)[0];
        if (str_contains($firstName,'.')) {
            $firstName = explode(' ',$fullName)[1];
        }
        return [
            'name' =>   $fullName,
            'shortname' =>    $firstName,
            'city_of_birth' => $this->faker->city,
            'birth_date' => $this->faker->dateTimeBetween('-39 years', '-16 years')->format('Y-m-d'),
            'salary' => $this->faker->numberBetween(100, 999) * 100,
            'position' => $this->faker->randomElement(['Forward', 'Midfielder', 'Defender', 'Goalkeeper']),
            'side' => $this->faker->randomElement(['Center', 'Left', 'Right']),
            'country_id' => Country::inRandomOrder()->first()->id,
            // 'team_id' => Team::inRandomOrder()->first()->id,
        ];
    }
}
