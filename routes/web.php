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

Route::group(['namespace' => 'Admin', 'middleware' => 'permissions:admin'], function () {
    
    Route::get('/admin', 'HomeController@index');
	Route::get('admin/products/missing', 'ProductController@missing')->name('products.missing');
	Route::get('admin/products/minimum', 'ProductController@minimum')->name('products.minimum');
    
	Route::resource('admin/categories', 'CategoryController');
	Route::resource('admin/providers', 'ProviderController');
	Route::resource('admin/brands', 'BrandController');
	Route::resource('admin/products', 'ProductController');
});
