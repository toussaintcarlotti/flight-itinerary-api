<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightRequest;
use App\Http\Resources\FlightResource;
use App\Models\Flight;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FlightController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return FlightResource::collection(Flight::all());
    }

    public function store(FlightRequest $request): FlightResource
    {
        return new FlightResource(Flight::create($request->validated()));
    }

    public function show(Flight $airport): FlightResource
    {
        return new FlightResource($airport);
    }

    public function update(FlightRequest $request, Flight $airport): FlightResource
    {
        $airport->update($request->validated());

        return new FlightResource($airport);
    }

    public function destroy(Flight $airport): JsonResponse
    {
        $airport->delete();

        return response()->json();
    }
}
