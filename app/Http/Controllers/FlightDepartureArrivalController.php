<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlightResource;
use App\Models\Flight;

class FlightDepartureArrivalController extends Controller
{
    public function __invoke(string $departure, string $arrival, string $begin, string $end)
    {
        $flights = Flight::where('estDepartureAirport', $departure)
            ->where('estArrivalAirport', $arrival)
            ->where('firstSeen', '>=', $begin)
            ->where('lastSeen', '<=', $end)
            ->get();

        return FlightResource::collection($flights);
    }
}
