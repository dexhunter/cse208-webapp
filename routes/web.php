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
Route::get('home', function() {
    return redirect('dashboard');
});

Route::get('/dashboard', 'DashboardController@index');

Route::resource('acts', 'ActivityController');
Auth::routes();

Route::get('alluser', 'UserController@Alluser');

Route::post('acts/{id}/join', 'UserController@joinAct');
Route::get('acts/{id}/viewuser', 'UserController@userInfo');
Route::get('acts/{id}/destroy', 'ActivityController@fakeDestroy');

Route::get('acts/category/{category_no}', 'ActivityController@searchByCategory')->where('id', '[0-6]+');

Route::any('/search', 'ActivityController@searchByString');

Route::any('pageview', 'ActivityController@sortByPageView');

Route::get('about', 'HomeController@about');


Route::get('acts/{id}/twitter', function ($id){
    return redirect(Share::load('http://127.0.0.1/acts'.$id.'/twitter', 'Sharing to Twitter')->twitter());
});

Route::get('acts/{id}/facebook', function ($id){
    return redirect(Share::load('http://127.0.0.1/acts'.$id.'/facebook', 'Sharing to Facebook')->facebook());
});

Route::get('acts/{id}/gplus', function ($id){
    return redirect(Share::load('http://127.0.0.1/acts'.$id.'/gplus', 'Sharing to Google Plus')->gplus());
});

Route::get('acts/{id}/linkedin', function ($id){
    return redirect(Share::load('http://127.0.0.1/acts'.$id.'/linkedin', 'Sharing to LinkedIN')->linkedin());
});

Route::get('acts/{id}/tumblr', function ($id){
    return redirect(Share::load('http://127.0.0.1/acts'.$id.'/tumblr', 'Sharing to Tumblr')->tumblr());
});
