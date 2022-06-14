<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Airport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aeroport>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDateTime = $this->faker->dateTimeBetween('now', '+20 weeks');
        $endDateTime = clone $startDateTime;
        $endDateTime->modify('+ ' . random_int(0,14) . ' days');

        $bounds = Airport::inRandomOrder()
        ->limit(2)
        ->get();

        $datas = [
            'startDateTime' => $startDateTime,
            'endDateTime' => $endDateTime,
            'flightNumber' => $this->faker->unique()->randomNumber(7),
            'inbound' => $bounds[0],
            'outbound' => $bounds[1],
            'capacity' => $this->faker->numberBetween(6,50),
            'price' => $this->faker->randomFloat(2,30,150),
            'id_pilot' => User::where(['role' => 'pilot'])->inRandomOrder()->limit(1)->get()[0],
        ];

        return $datas;
    }
}
