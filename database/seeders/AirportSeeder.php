<?php

namespace Database\Seeders;

use App\Models\Airport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
         * Run the database seeders.
         *
         * @return void
         */
        public function run()
        {
            Airport::factory()
                ->count(25)
                ->create();
        }
}
