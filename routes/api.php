<?php

use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightArrivalController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightDepartureController;
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

Route::resource('airports', AirportController::class);
Route::resource('flights', FlightController::class);

Route::get('/flights/departure/{airport}/{begin}/{end}', FlightDepartureController::class);
Route::get('/flights/arrival/{airport}/{begin}/{end}', FlightArrivalController::class);
Route::get('/flights/departure-arrival/{departure}/{arrival}/{begin}/{end}', FlightArrivalController::class);

