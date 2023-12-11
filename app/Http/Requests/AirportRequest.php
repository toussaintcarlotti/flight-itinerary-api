<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirportRequest extends FormRequest
{
    public function rules()
    {
        return [
            'code' => ['nullable'],
            'lat' => ['nullable'],
            'name' => ['nullable'],
            'city' => ['nullable'],
            'state' => ['nullable'],
            'country' => ['nullable'],
            'woeid' => ['nullable'],
            'tz' => ['nullable'],
            'phone' => ['nullable'],
            'type' => ['nullable'],
            'email' => ['nullable', 'email', 'max:254'],
            'url' => ['nullable'],
            'runway_length' => ['nullable'],
            'elev' => ['nullable'],
            'icao' => ['nullable'],
            'direct_flights' => ['nullable'],
            'carriers' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
