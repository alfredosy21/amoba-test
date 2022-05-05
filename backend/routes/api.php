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
Route::get('/', function () {
    return view('welcome');
});
Route::post('/login', 'Auth\UserAuthController@login');

Route::post('/logout', 'Auth\UserAuthController@logout');

Route::get('/user','Auth\UserAuthController@getUser');

Route::apiResource('/person', 'PersonController')->middleware('auth:api');
