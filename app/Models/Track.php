<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Track extends Model
{
    protected $fillable = ['flight_id', 'icao24', 'callsign', 'startTime', 'endTime', 'path'];

    protected $casts = [
        'path' => 'array',
    ];

    /******************************
     *** RELATIONSHIPS
     ******************************/
    public function flight(): HasOne
    {
        return $this->hasOne(Flight::class);
    }
}
