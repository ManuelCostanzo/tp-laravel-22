<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
        	'name' 				=>	'Coca Cola',
        ]);

        Brand::create([
        	'name' 				=>	'Jorgito',
        ]);

        Brand::create([
        	'name' 				=>	'Manaos',
        ]);
    }
}
