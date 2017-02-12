<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    #ADMIN-MOD AREA
	Route::group(['middleware' => 'permissions:admin-mod'], function() {   
		Route::get('/', 'DashboardController@index');
		Route::get('products/missing', 'ProductController@missing')->name('products.missing');
		Route::get('products/minimum', 'ProductController@minimum')->name('products.minimum');
		Route::resource('products', 'ProductController');
	});

    #ADMIN AREA
	Route::group(['middleware' => 'permissions:admin'], function() {   
		Route::resource('categories', 'CategoryController');
		Route::resource('providers', 'ProviderController');
		Route::resource('brands', 'BrandController');
	});
});
