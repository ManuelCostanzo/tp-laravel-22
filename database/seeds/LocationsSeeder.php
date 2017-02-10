<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
        	'name' 				=>	'LIDI 3',
        ]);

        Location::create([
        	'name' 				=>	'LIFIA',
        ]);

        Location::create([
        	'name' 				=>	'LINTI',
        ]);
    }
}
