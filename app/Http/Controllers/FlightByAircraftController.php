<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlightResource;
use App\Models\Flight;

class FlightByAircraftController extends Controller
{
    public function __invoke(string $icao24, string $begin, string $end)
    {
        $flights = Flight::where('icao24', $icao24)
            ->where('firstSeen', '>=', $begin)
            ->where('firstSeen', '<=', $end)
            ->get();

        return FlightResource::collection($flights);
    }
}
