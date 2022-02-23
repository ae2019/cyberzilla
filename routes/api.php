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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
 
// Users
Route::get('users',     'App\Http\Controllers\Zilla\UsersController@users');
Route::get('users/{id}','App\Http\Controllers\Zilla\UsersController@user')->where(['id' => '[0-9]+']);;
Route::post('users',    'App\Http\Controllers\Zilla\UsersController@postUser');
Route::put('users/{id}','App\Http\Controllers\Zilla\UsersController@editUser')->where(['id' => '[0-9]+']);;
Route::delete('users/{id}','App\Http\Controllers\Zilla\UsersController@deleteUser')->where(['id' => '[0-9]+']);;
// Payments
Route::get('pays/{uid}',     'App\Http\Controllers\Zilla\UsersController@pays')->where(['uid' => '[0-9]+']);;

// JWT
Route::group([
    'middleware' => 'auth'
    /*,'prefix' => 'api'*/
], function ($router) {
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

Route::post('login', 'App\Http\Controllers\AuthController@login');
//Route::get('login', 'App\Http\Controllers\AuthController@login');