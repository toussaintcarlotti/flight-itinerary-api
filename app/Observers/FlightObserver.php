<?php

namespace App\Observers;

use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Support\Carbon;

class FlightObserver
{
    public function created(Flight $flight)
    {
        $flight->track()->create([
            'flight_id' => $flight->id,
            'icao24' => $flight->icao24,
            'callsign' => $flight->callsign,
            'startTime' => $flight->firstSeen,
            'endTime' => $flight->lastSeen,
            'path' => $this->calculatePath($flight->departureAirport, $flight->arrivalAirport, $flight->firstSeen, $flight->lastSeen)
        ]);
    }

    private function calculatePath(Airport $departureAirport, Airport $arrivalAirport, $startTime, $endTime): array
    {
        // Convertir les coordonnées de départ et d'arrivée en nombres flottants
        $startLat = (float)$departureAirport->lat;
        $startLon = (float)$departureAirport->lon;
        $endLat = (float)$arrivalAirport->lat;
        $endLon = (float)$arrivalAirport->lon;

        // Calculer la différence entre les coordonnées de départ et d'arrivée
        $latDiff = $endLat - $startLat;
        $lonDiff = $endLon - $startLon;

        // Calculer la distance totale entre les aéroports
        $totalDistance = $this->calculateDistance($startLat, $startLon, $endLat, $endLon);

        // Calculer le temps total nécessaire pour le voyage
        $totalTime = $endTime - $startTime;

        // Calculer le nombre total de waypoints en fonction de l'intervalle de temps (2 minutes)
        $interval = 120; // 2 minutes en secondes
        $numWaypoints = floor($totalTime / $interval) + 1;

        // Calculer l'incrément de temps pour chaque waypoint
        $timeIncrement = $totalTime / ($numWaypoints - 1);

        // Initialiser le tableau de trajectoire
        $path = [];
        $currentTime = $startTime;

        // Générer les waypoints avec des intervalles de temps ajustés
        for ($i = 0; $i < $numWaypoints; $i++) {
            $progress = $i / ($numWaypoints - 1); // Progression linéaire de 0 à 1
            $time = $currentTime + $progress * $totalTime;

            // Interpoler les coordonnées en fonction de la progression
            $latitude = $startLat + $progress * $latDiff;
            $longitude = $startLon + $progress * $lonDiff;

            $altitude = 30000; // Altitude fixe pour cet exemple
            $trueTrack = $this->calculateTrueTrack($startLat, $startLon, $endLat, $endLon);
            $onGround = false;

            $path[] = [$time, $latitude, $longitude, $altitude, $trueTrack, $onGround];
            $currentTime += $timeIncrement; // Utiliser l'incrément de temps calculé
        }

        return $path;
    }

    private function calculateTrueTrack($startLat, $startLon, $endLat, $endLon): int
    {
        $deltaLon = $endLon - $startLon;
        $y = sin($deltaLon) * cos($endLat);
        $x = cos($startLat) * sin($endLat) - sin($startLat) * cos($endLat) * cos($deltaLon);
        $trueTrack = atan2($y, $x);

        // Convertir de radians à degrés
        $trueTrack = rad2deg($trueTrack);

        // Assurer que le cap est compris entre 0 et 360 degrés
        $trueTrack = ($trueTrack + 360) % 360;

        return $trueTrack;
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2): float|int
    {
        $earthRadius = 6371; // Rayon moyen de la Terre en kilomètres

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        return $distance;
    }
}
