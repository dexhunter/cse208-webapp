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

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index');

Route::resource('acts', 'ActivityController');
Auth::routes();

Route::get('alluser', 'UserController@Alluser');
// Route::post('/acts', 'ActivityContoller@joinUser');
Route::post('acts/{id}', 'UserController@joinAct')->where('id', '[0-6]+');
Route::get('acts/category/{category_no}', 'ActivityController@searchByCategory');

Route::get('acts/pageview', 'ActivityController@sortByPageView');

Route::get('acts/search', 'ActivityController@searchByString');