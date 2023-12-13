<?php

namespace Database\Factories;

use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition()
    {
        $aiports = Airport::all()->pluck('icao')->toArray();

        $startDate = now()->timestamp + $this->faker->numberBetween(-31556926, 31556926);
        return [
            'icao24' => $this->faker->word(),
            'firstSeen' => $startDate,
            'estDepartureAirport' => $this->faker->randomElement($aiports),
            'lastSeen' => $startDate + $this->faker->numberBetween(3600, 100400),
            'estArrivalAirport' => $this->faker->randomElement($aiports),
            'callsign' => $this->faker->word(),
            'estDepartureAirportHorizDistance' => $this->faker->numberBetween(100, 30000),
            'estDepartureAirportVertDistance' => $this->faker->numberBetween(3, 150),
            'estArrivalAirportHorizDistance' => $this->faker->numberBetween(100, 30000),
            'estArrivalAirportVertDistance' => $this->faker->numberBetween(3, 3000),
            'departureAirportCandidatesCount' => 1,
            'arrivalAirportCandidatesCount' => $this->faker->numberBetween(0, 10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
