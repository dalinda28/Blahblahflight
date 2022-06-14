<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FlightSeeder extends Seeder
{
    /**
         * Run the database seeders.
         *
         * @return void
         */
        public function run()
        {
            Flight::factory()
                ->count(50)
                ->create();
        }
}
