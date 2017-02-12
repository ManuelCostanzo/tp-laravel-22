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
    
    Route::get('/admin', function () {
    	return view('admin/dashboard');
    });
    
	Route::resource('admin/categories', 'CategoryController');
});

Route::get('management', ['middleware' => 'permissions:management', 'uses' => 'ManagementController@index']);
