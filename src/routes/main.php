<?php

use App\Http\Route;

Route::post('/users/login', 'UserController@login');
Route::post('/plates/create', 'PlateController@store');
Route::get('/plates/fetch', 'PlateController@fetch');