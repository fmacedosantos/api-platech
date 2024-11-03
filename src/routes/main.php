<?php

use App\Http\Route;

Route::get('/createTables', 'HomeController@create');
Route::post('/users/login', 'UserController@login');
Route::post('/users/create', 'UserController@store');
Route::post('/plates/create', 'PlateController@store');
Route::get('/plates/fetch', 'PlateController@fetch');
Route::post('/clients/create', 'ClientController@store');
Route::get('/clients/fetch', 'ClientController@fetch');