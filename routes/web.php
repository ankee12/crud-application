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
	Route::get('/edit/{id}',['uses'=>'CustomerCtrl@edit','as'=>'edit']);
	Route::post('/update/{id}',['uses'=>'CustomerCtrl@update','as'=>'update']);
    Route::get('/destroy/{id}',['uses'=>'CustomerCtrl@destroy','as'=>'destroy']);
    
   	Route::get('/login', ['uses' => 'HomeController@Login', 'as'=>'login']);
    Route::post('/login/loginme', ['uses' => 'HomeController@getLogin', 'as'=>'loginme']);
    Route::get('/login/logout', ['uses' => 'HomeController@getLogout', 'as'=>'logout']);
    Route::get('/blog', ['uses' => 'HomeController@blog', 'as'=>'blog'])->middleware('auth');
    
    Route::post('/login/loginme/comment', ['uses' => 'BlogCtrl@store', 'as'=>'comment']);
    