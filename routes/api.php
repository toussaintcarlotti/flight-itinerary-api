<?php

use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightArrivalController;
use App\Http\Controllers\FlightByAircraftController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightDepartureArrivalController;
use App\Http\Controllers\FlightDepartureController;
use App\Http\Controllers\TrackByAircraftController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('airports', [AirportController::class, 'index']);
Route::get('flights', [FlightController::class, 'index']);

Route::get('/flights/departure/{airport}/{begin}/{end}', FlightDepartureController::class);
Route::get('/flights/arrival/{airport}/{begin}/{end}', FlightArrivalController::class);
Route::get('/flights/departure-arrival/{departure}/{arrival}/{begin}/{end}', FlightDepartureArrivalController::class);

Route::get('flights/aircraft/{icao24}/{begin}/{end}', [FlightByAircraftController::class, 'index']);

Route::get('/tracks/{icao24}/{time}', TrackByAircraftController::class);

