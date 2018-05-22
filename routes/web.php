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

Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'DashboardController@index');

Route::resource('acts', 'ActivityController');
Auth::routes();

Route::get('alluser', 'UserController@Alluser');
// Route::post('/acts', 'ActivityContoller@joinUser');

Route::post('acts/{id}', 'UserController@joinAct');

Route::get('acts/category/{category_no}', 'ActivityController@searchByCategory')->where('id', '[0-6]+');

Route::get('acts/pageview', 'ActivityController@sortByPageView');

Route::any('/search', 'ActivityController@searchByString');
