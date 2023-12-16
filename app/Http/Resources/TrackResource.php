<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Track */
class TrackResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'flight_id' => $this->flight_id,
            'icao24' => $this->icao24,
            'callsign' => $this->callsign,
            'startTime' => $this->startTime,
            'endTime' => $this->endTime,
            'path' => $this->path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
