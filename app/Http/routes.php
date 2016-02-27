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
});

Route::group(['middleware' => ['web', 'auth']], function () {
	Route::get('logout', 'PagesController@logout');
	
	Route::get('dashboard', 'DashboardController@showDashboard');
	Route::post('add-to-cart/{id}', 'DashboardController@addToCart');
	Route::post('remove-from-cart/{id}', 'DashboardController@removeFromCart');
	Route::post('empty-cart', 'DashboardController@emptyCart');
	Route::post('checkout', 'DashboardController@checkout');
	Route::post('make-order', 'DashboardController@makeOrder');
	Route::post('refund/{id}', 'DashboardController@refund');
});

Route::group(['middleware' => ['web', 'auth', 'admin']], function() {
	Route::get('admin', 'AdminController@show');
});