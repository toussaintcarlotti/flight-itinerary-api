<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrackResource;
use App\Models\Track;

class TrackByAircraftController extends Controller
{
    public function __invoke(string $icao24, string $time)
    {
        $track = Track::where('icao24', $icao24)
            ->where('startTime', '<=', $time)
            ->where('endTime', '>=', $time)
            ->firstOrFail();

        return new TrackResource($track);
    }
}
