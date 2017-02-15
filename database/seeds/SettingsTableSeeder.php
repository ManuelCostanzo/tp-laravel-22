<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'title'                      =>  'Buffet Informatica',
            'description'                =>  'El mejor buffet papaaa',
            'contact_email'                      =>  'manuelcostanzo22@gmail.com',
            'items_per_page'            =>  3,
            'site_enabled'                    =>  true,
            'maintenance_message'         =>  'Estamos en moderacion no rompas las pelotas',
        ]);
    }
}
