<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\CatController@show');

/*
Route::get('/hi', function () {
    $test = "hello";
    return view("hi", compact("test"));
});*/

Route::get('/tab', 'App\Http\Controllers\TabController@show');

// Categories
Route::get('/cat{cid}','App\Http\Controllers\CatController@details'
)->where(['id' => '[0-9]+']);

// program by charname
Route::get('/p/{charname}','App\Http\Controllers\WareController@details'
)->where(['charname' => '[a-zA-Z0-9_.]+']);

// program by id
Route::get('/pd/{pid}','App\Http\Controllers\WareController@det_by_id'
)->where(['pid' => '[0-9]+']);

Route::get('/contact', 'App\Http\Controllers\ContactController@show')->name("contact");
Route::post('/contact/submit', 'App\Http\Controllers\ContactController@post')->name("contact-form");

// Count downloads ++
Route::put('/restapi/counter/download/{wid}','App\Http\Controllers\RestapiController@dload_inc'
)->where(['wid' => '[0-9]+']);

// Zilla task
Route::get('/zusers/', function () {
    return view("zilla.users" );
})->middleware(['auth']);

Route::get('/zuser_edit/{id}','App\Http\Controllers\Zilla\ZUsersController@userEdit'
)->where(['id' => '[0-9]+'])->middleware(['auth']);

Route::get('/zuser_payments/{id}','App\Http\Controllers\Zilla\ZUsersController@userPayments'
)->where(['id' => '[0-9]+'])->middleware(['auth']);

// Added by :
// php artisan Breeze:install
Route::get('/wel', function () { return view('welcome'); });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
