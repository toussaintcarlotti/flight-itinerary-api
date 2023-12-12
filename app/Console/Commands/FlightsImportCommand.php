<?php

namespace App\Console\Commands;

use App\Models\Flight;
use Illuminate\Console\Command;

class FlightsImportCommand extends Command
{
    protected $signature = 'flights:import';

    protected $description = 'Command description';

    public function handle()
    {
        $file = \File::get(base_path('/public/jsonData/mock.json'));
        Flight::truncate();
        Flight::insert(json_decode($file, true, 512, JSON_THROW_ON_ERROR));
    }
}
