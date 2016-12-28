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

	Route::get('/', 'HomeController@index');
	Route::resource('cpanel','CpanelController');
	Route::get('editmovie','CpanelController@showmovie');
	Route::get('selectuser','CpanelController@selectuser');
	Route::get('selectpassword','CpanelController@selectpassword');
	Route::get('selectrange','CpanelController@selectrange');
	Route::get('approvemovie','CpanelController@approvemovie');
	Route::get('approveMovieToNotif/{id}','CpanelController@approveMovieToNotif');
	Route::get('editfromnotif/{id}','CpanelController@editfromnotif');
	Route::resource('user','UserController');
	Route::resource('upload','MovieController');
	Route::post('approve','MovieController@approveMovie');
	Route::get('createplaylist','PlaylistController@index');
	Route::get('deleteplaylist','PlaylistController@delete');
	Route::get('search','QueryController@search');
	Route::get('filter','QueryController@filter');
	Route::resource('cine_tv','CineTvController');
	Route::get('showadver','CpanelController@showadvert');
	Route::get('createadver','CpanelController@createadvert');
	Route::get('createprogram','CpanelController@createprogram');
	Route::post('deleteadvertising','AdvertisingController@delete');
	Route::resource('advertising','AdvertisingController');
	Route::resource('programing','ProgramingController');

Route::group(['middleware' => 'web'], function () {
	Route::auth();
});