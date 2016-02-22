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
	
	Route::get('admin', 'AdminController@show');
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('logout', 'PagesController@logout');
	
	Route::get('dashboard', 'DashboardController@showDashboard');
	Route::get('add-to-cart/{id}', 'DashboardController@addToCart');
	Route::get('remove-from-cart/{id}', 'DashboardController@removeFromCart');
	Route::get('empty-cart', 'DashboardController@emptyCart');
	Route::get('checkout', 'DashboardController@checkout');
	Route::get('make-order', 'DashboardController@makeOrder');
});
