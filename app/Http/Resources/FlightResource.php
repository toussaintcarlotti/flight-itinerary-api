<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Flight */
class FlightResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'icao24' => $this->icao24,
            'firstSeen' => $this->firstSeen,
            'estDepartureAirport' => $this->estDepartureAirport,
            'lastSeen' => $this->lastSeen,
            'estArrivalAirport' => $this->estArrivalAirport,
            'callsign' => $this->callsign,
            'estDepartureAirportHorizDistance' => $this->estDepartureAirportHorizDistance,
            'estDepartureAirportVertDistance' => $this->estDepartureAirportVertDistance,
            'estArrivalAirportHorizDistance' => $this->estArrivalAirportHorizDistance,
            'estArrivalAirportVertDistance' => $this->estArrivalAirportVertDistance,
            'departureAirportCandidatesCount' => $this->departureAirportCandidatesCount,
            'arrivalAirportCandidatesCount' => $this->arrivalAirportCandidatesCount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
