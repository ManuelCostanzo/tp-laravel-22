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


	#ADMIN AREA
    Route::group(['middleware' => 'permissions:admin'], function() {
    	create_admin_routes('admin');
   	});


    #ADMIN-MOD AREA
    Route::group(['middleware' => 'permissions:admin-mod'], function() {
    	Route::get('/', 'DashboardController@index');
    	create_admin_routes('admin-mod');
	});
});

function create_admin_routes($permission) {
	foreach (config('global.' . $permission . '_sections') as $key => $section) {
		Route::get($key . '/searh', $section['controller'] . '@search')->name($key . '.search');
		
		if (isset($section['methods'])) {
			foreach ($section['methods'] as $method) {
				Route::get($key . '/' . $method, $section['controller'] . '@'. $method)->name($key . '.' . $method);
			}
		}

		Route::resource($key, $section['controller']);
	}
}