<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightRequest extends FormRequest
{
    public function rules()
    {
        return [
            'icao24' => ['nullable'],
            'firstSeen' => ['nullable'],
            'estDepartureAirport' => ['nullable'],
            'lastSeen' => ['nullable'],
            'estArrivalAirport' => ['nullable'],
            'callsign' => ['nullable'],
            'estDepartureAirportHorizDistance' => ['nullable'],
            'estDepartureAirportVertDistance' => ['nullable'],
            'estArrivalAirportHorizDistance' => ['nullable'],
            'estArrivalAirportVertDistance' => ['nullable'],
            'departureAirportCandidatesCount' => ['nullable'],
            'arrivalAirportCandidatesCount' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
