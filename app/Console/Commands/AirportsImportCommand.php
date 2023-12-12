<?php

namespace App\Console\Commands;

use App\Models\Airport;
use Illuminate\Console\Command;

class AirportsImportCommand extends Command
{
    protected $signature = 'airports:import';

    protected $description = 'Import des aéroports';

    public function handle()
    {
        $file = \File::get(base_path('/public/jsonData/airports.json'));
        Airport::truncate();
        Airport::insert(json_decode($file, true, 512, JSON_THROW_ON_ERROR));

    }
}
