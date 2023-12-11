<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportRequest;
use App\Http\Resources\AirportResource;
use App\Models\Airport;

class AirportController extends Controller
{
    public function index()
    {
        return Airport::all();
    }

    public function store(AirportRequest $request)
    {
        return new AirportResource(Airport::create($request->validated()));
    }

    public function show(airport $airport)
    {
        return new AirportResource($airport);
    }

    public function update(AirportRequest $request, airport $airport)
    {
        $airport->update($request->validated());

        return new AirportResource($airport);
    }

    public function destroy(airport $airport)
    {
        $airport->delete();

        return response()->json();
    }
}
