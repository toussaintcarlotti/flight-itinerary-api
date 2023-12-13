<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlightResource;
use App\Models\Flight;
use Carbon\Carbon;

class FlightDepartureController extends Controller
{
    public function __invoke(string $airport, string $departure, string $arrival)
    {
        $flights = Flight::where('estDepartureAirport', $airport)
            ->where('firstSeen', '>=', $departure)
            ->where('lastSeen', '<=', $arrival)
            ->get();

        return FlightResource::collection($flights);
    }
}
