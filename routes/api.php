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

Route::get('bookings', 'BookingController@index');
Route::get('booking/{id}', 'BookingController@show');
Route::post('booking', 'BookingController@store');
Route::put('booking', 'BookingController@store');
Route::delete('booking/{id}', 'BookingController@destroy');