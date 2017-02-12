<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' 				=>	'Golosinas',
        ]);

        Category::create([
        	'name' 				=>	'Minutas',
        ]);

        Category::create([
        	'name' 				=>	'Alfajores',
            'parent_id'         =>  1
        ]);
    }
}
