<?php

use Illuminate\Database\Seeder;
use App\Provider;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provider::create([
            'name'              =>  'Coca Cola inc.',
            'cuit'              =>  2039485023,
        ]);

        Provider::create([
            'name'              =>  'Las Termas SA',
            'cuit'              =>  458442915493,
        ]);

        Provider::create([
        	'name' 				=>	'Los Pinguinos',
            'cuit'              =>  43534534 
        ]);
    }
}
