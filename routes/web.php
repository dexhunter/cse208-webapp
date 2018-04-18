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

//Route::get('/', 'ActController@index');
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::resource('/acts', 'ActsController');
Auth::routes();

Route::resource('/orgs', 'OrgsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

// Route::get('/org', 'PagesController@organisation');
