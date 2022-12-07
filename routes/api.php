<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/animal_kinds', 'AnimalController@index');
Route::get('/show', 'AnimalController@show');
Route::get('/list', 'AnimalController@list');
Route::post('/create', 'AnimalController@create');
Route::post('/update', 'AnimalController@update');