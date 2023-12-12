<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Airport */
class AirportResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'lon' => $this->lon,
            'lat' => $this->lat,
            'name' => $this->name,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'woeid' => $this->woeid,
            'tz' => $this->tz,
            'phone' => $this->phone,
            'type' => $this->type,
            'email' => $this->email,
            'url' => $this->url,
            'runway_length' => $this->runway_length,
            'elev' => $this->elev,
            'icao' => $this->icao,
            'direct_flights' => $this->direct_flights,
            'carriers' => $this->carriers,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
