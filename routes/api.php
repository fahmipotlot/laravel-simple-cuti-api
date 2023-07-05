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

Route::post('/login', 'Api\AuthController@login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/annual-leaves', 'Api\CutiController@index');
    Route::get('/annual-leaves/{id}', 'Api\CutiController@show');
    Route::post('/annual-leaves', 'Api\CutiController@store');
});
