<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

//Route::apiResource('prueba261118', 'prueba261118Controller');
// Route::apiResource('songs', 'SongController');

Route::apiResource('user', 'UserController');

Route::apiResource('password', 'PasswordController');

Route::apiResource('category', 'CategoryController');

Route::apiResource('role', 'RolController');

Route::Post('login', 'UserController@login');