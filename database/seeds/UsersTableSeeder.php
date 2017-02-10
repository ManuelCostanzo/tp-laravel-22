<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'nick' 				=>	'ManuelCostanzo',
        	'email'				=>	'manuelcostanzo22@gmail.com',
        	'password'			=>	bcrypt('lalala'),
        	'name'				=>	'Manuel',
        	'surname'			=>	'Costanzo',
        	'document'			=>	39406740,
        	'phone'				=>	2214815847,
            'location_id'       =>  1,
        	'enabled'			=>	1
        ]);

        User::create([
        	'nick' 				=>	'MarcosBoggia',
        	'email'				=>	'marcosboggia@gmail.com',
        	'password'			=>	bcrypt('lalala'),
        	'name'				=>	'Marcos',
        	'surname'			=>	'Boggia',
        	'document'			=>	39000000,
        	'phone'				=>	2214000000,
            'location_id'       =>  2,
        	'enabled'			=>	1
        ]);

        User::create([
        	'nick' 				=>	'SinActivar',
        	'email'				=>	'sinactivar@gmail.com',
        	'password'			=>	bcrypt('lalala'),
        	'name'				=>	'Sin',
        	'surname'			=>	'Activar',
        	'document'			=>	20000000,
        	'phone'				=>	4560979,
            'location_id'       =>  3,
        	'enabled'			=>	0
        ]);
    }
}
