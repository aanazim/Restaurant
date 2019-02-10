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

Route::get('/','WelcomeController@index')->name('welcome');
Route::post('/reservation','ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact','ContactController@update')->name('contact.update');

Auth::routes();

Route::group(["prefix"=>'admin','middleware'=>'auth','namespace'=>'admin'],function(){
	Route::get('/dashboard','dashboardController@index')->name('admin.dashboard');
	Route::resource('/slider','SliderController');
	Route::resource('/category','CategoryController');
	Route::resource('/item','ItemController');
	Route::resource('about','AboutController');
	Route::resource('link','LinkController');
	Route::get('/reservation','RservationController@index')->name('reservation.index');
	Route::get('/edit{id}','RservationController@edit')->name('status.edit');
	Route::post('/update{id}','RservationController@update')->name('status.update');
	Route::get('/destroy{id}','RservationController@delete')->name('status.destroy');
    Route::get('/contact','ContactController@index')->name('contact.index');
    Route::get('/show{id}','ContactController@show')->name('contact.show');
    Route::get('/delete{id}','ContactController@delete')->name('contact.delete');

});
