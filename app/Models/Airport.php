<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Airport extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'lat',
        'name',
        'city',
        'state',
        'country',
        'woeid',
        'tz',
        'phone',
        'type',
        'email',
        'url',
        'runway_length',
        'elev',
        'icao',
        'direct_flights',
        'carriers',
    ];

    /******************************
     *** RELATIONSHIPS
     ******************************/
    public function departures(): HasMany
    {
        return $this->hasMany(Flight::class, 'estDepartureAirport', 'icao');
    }

    public function arrivals(): HasMany
    {
        return $this->hasMany(Flight::class, 'estArrivalAirport', 'icao');
    }
}
