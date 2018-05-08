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

Route::get('/send', 'Auth\LoginController@send');

Route::get('/login', 'Auth\LoginController@showLogin');


// Route::get('/xxx', function() {
//     $this -> error('Display this on the screen');
//     echo "xx";
// });

Route::get('/sendActivationMail','Auth\RegisterController@create');

Route::get('/activeAccount','Auth\RegisterController@active');
// Route::get('/org', 'PagesController@organisation');
