<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	Route::get('/', 'PagesController@showHome');
	Route::post('/', 'PagesController@login');
	
	Route::get('/set', function(){
	    Session::put('session', 'working');
	    echo Session::get('session');
	});
	
	Route::get('/get', function(){
	    echo Session::get('session');
	});
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('dashboard', 'PagesController@dashboard');
	Route::get('logout', 'PagesController@logout');
});
