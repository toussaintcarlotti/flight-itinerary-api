<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'icao24',
        'firstSeen',
        'estDepartureAirport',
        'lastSeen',
        'estArrivalAirport',
        'callsign',
        'estDepartureAirportHorizDistance',
        'estDepartureAirportVertDistance',
        'estArrivalAirportHorizDistance',
        'estArrivalAirportVertDistance',
        'departureAirportCandidatesCount',
        'arrivalAirportCandidatesCount'
    ];

    /******************************
     *** RELATIONSHIPS
     ******************************/
    public function departureAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'estDepartureAirport', 'icao');
    }

    public function arrivalAirport(): BelongsTo
    {
        return $this->belongsTo(Airport::class, 'estArrivalAirport', 'icao');
    }

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class);
    }
}
