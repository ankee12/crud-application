<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

	Route::get('/', function () {
    return view('welcome');
	});
	Route::get('/form', ['uses'=>'CustomerCtrl@index','as'=>'form'], function() {
	return view::make('form');
	});

	Route::post('store', ['uses'=>'CustomerCtrl@store','as'=>'store']);
	Route::get('/form/create', ['uses'=>'CustomerCtrl@create','as'=>'create']);



