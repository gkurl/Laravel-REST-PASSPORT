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
    return view('welcome');
});

Route::get('/', function () {
	return view('index');
});

Route::group(['prefix' => 'api'], function()
{
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
	Route::post('authenticate', 'AuthenticateController@authenticate');
});

//changed the starting route to load a view that i'll create later called index
// instead of welcome. Created a route group that is prefixed with api and that currently serves a resource called authenticate.
// only really want the index method of this resource controller which can indicate with the third argument.
// also need a custom method called authenticate on this controller which handles generating and returning a JWT