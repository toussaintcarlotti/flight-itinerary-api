<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('icao24')->nullable();
            $table->string('firstSeen')->nullable();
            $table->string('estDepartureAirport')->nullable();
            $table->string('lastSeen')->nullable();
            $table->string('estArrivalAirport')->nullable();
            $table->string('callsign')->nullable();
            $table->string('estDepartureAirportHorizDistance')->nullable();
            $table->string('estDepartureAirportVertDistance')->nullable();
            $table->string('estArrivalAirportHorizDistance')->nullable();
            $table->string('estArrivalAirportVertDistance')->nullable();
            $table->string('departureAirportCandidatesCount')->nullable();
            $table->string('arrivalAirportCandidatesCount')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flights');
    }
};
