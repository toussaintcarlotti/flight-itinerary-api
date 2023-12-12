<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportRequest;
use App\Http\Resources\AirportResource;
use App\Models\Airport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AirportController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return AirportResource::collection(Airport::all());
    }

    public function store(AirportRequest $request): AirportResource
    {
        return new AirportResource(Airport::create($request->validated()));
    }

    public function show(Airport $airport): AirportResource
    {
        return new AirportResource($airport);
    }

    public function update(AirportRequest $request, Airport $airport): AirportResource
    {
        $airport->update($request->validated());

        return new AirportResource($airport);
    }

    public function destroy(Airport $airport): JsonResponse
    {
        $airport->delete();

        return response()->json();
    }
}
