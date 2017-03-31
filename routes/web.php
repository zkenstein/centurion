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


Route::auth();

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function(){

	Route::get('upload', 'UploadController@index');
	Route::post('upload/add', 'UploadController@store');
	Route::get('upload/{id}/down', 'UploadController@download');
	Route::delete('upload/{id}/delete', 'UploadController@destroy');

	Route::get('anggota','AnggotaController@index');
	Route::get('anggota/add','AnggotaController@create');
	Route::post('anggota/add','AnggotaController@store');

	Route::get('anggota/{id}/edit', 'AnggotaController@edit');
	Route::patch('anggota/{id}/edit', 'AnggotaController@update');

	Route::delete('anggota/{id}/delete', 'AnggotaController@destroy');

});

