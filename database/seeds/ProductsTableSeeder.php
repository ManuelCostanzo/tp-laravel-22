<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
        	'name' 				=>	'Mentoplus cacatolo',
        	'barcode'			=>	'sdfsdf23423n4',
        	'stock'			    =>	54,
        	'minimum_stock'		=>	5,
        	'unit_price'		=>	15,
        	'description'		=>	'Pastillas de fresa y menta',
            'image'             =>  'image.php',
        	'brand_id'			=>	1,
            'category_id'       =>  1,
            'provider_id'       =>  1,
        ]);

        Product::create([
            'name'              =>  'Sprite redbull',
            'barcode'           =>  'sdaf34vxd34',
            'stock'             =>  20,
            'minimum_stock'     =>  10,
            'unit_price'        =>  34,
            'description'       =>  'Sprite con redbull queda re pola',
            'image'             =>  'image2.php',
            'brand_id'          =>  2,
            'category_id'       =>  2,
            'provider_id'       =>  2,
        ]);

        Product::create([
            'name'              =>  'Sucurucho sacacomo',
            'barcode'           =>  '43534jhb345JHB54',
            'stock'             =>  3,
            'minimum_stock'     =>  9,
            'unit_price'        =>  40,
            'description'       =>  'Mierda con caca',
            'image'             =>  'image3.php',
            'brand_id'          =>  3,
            'category_id'       =>  3,
            'provider_id'       =>  3,
        ]);

    }
}
