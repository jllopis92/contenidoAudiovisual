<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::get('/','FrontController@index');
/*Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');*/

Route::get('/', 'HomeController@index');
//Route::get('upload','MovieController@index');
//Route::post('upload.store','MovieController@store');

	Route::resource('cpanel','CpanelController');
	Route::get('editmovie','CpanelController@showmovie');
	Route::get('approvemovie','CpanelController@approvemovie');
	Route::resource('upload','MovieController');
	Route::get('search','QueryController@search');
	Route::get('filter','QueryController@filter');
	Route::get('cine_tv','CineTvController@index');

Route::group(['middleware' => 'web'], function () {
	Route::auth();
	/*Route::get('/', function () {
		return view('index');
	});*/
	
/*	Route::resource('cpanel','CpanelController');
	Route::get('editmovie','CpanelController@showmovie');
	Route::get('approvemovie','CpanelController@approvemovie');
	Route::resource('upload','MovieController');
	Route::get('search','QueryController@search');
	Route::get('cine_tv','CineTvController@index');*/
});