<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlightResource;
use App\Models\Flight;
use Carbon\Carbon;

class FlightDepartureController extends Controller
{
    public function __invoke(string $airport, string $begin, string $end)
    {
        $flights = Flight::where('estDepartureAirport', $airport)
            ->where('firstSeen', '>=', $begin)
            ->where('lastSeen', '<=', $end)
            ->get();

        return FlightResource::collection($flights);
    }
}
