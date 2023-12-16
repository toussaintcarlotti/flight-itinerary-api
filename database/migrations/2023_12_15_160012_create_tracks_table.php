<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained();
            $table->string('icao24')->nullable();
            $table->string('callsign')->nullable();
            $table->string('startTime')->nullable();
            $table->string('endTime')->nullable();
            $table->json('path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tracks');
    }
};
