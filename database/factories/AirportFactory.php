<?php

namespace Database\Factories;

use App\Models\Airport;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AirportFactory extends Factory
{
    protected $model = Airport::class;

    public function definition()
    {
        return [
            'code' => $this->faker->word(),
            'lat' => $this->faker->latitude(),
            'name' => $this->faker->name(),
            'city' => $this->faker->city(),
            'state' => $this->faker->word(),
            'country' => $this->faker->country(),
            'woeid' => $this->faker->word(),
            'tz' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'type' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'url' => $this->faker->url(),
            'runway_length' => $this->faker->word(),
            'elev' => $this->faker->word(),
            'icao' => $this->faker->word(),
            'direct_flights' => $this->faker->word(),
            'carriers' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
