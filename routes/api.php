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


Route::prefix('reservations')->group(function () {
    Route::get('/', 'ReservationController@list');
    Route::post('/', 'ReservationController@store');
    Route::get('{reservation}', 'ReservationController@show');
    Route::post('{reservation}', 'ReservationController@update');
    Route::delete('{reservation}', 'ReservationController@delete');
});

Route::get('prices', function () {
    return [
        'camping' => [
            'type' => 'per-person',
            'base' => 10,
            'tax' => 4,
        ],
        'grand-apartment' => [
            'type' => 'per-night',
            'base' => 60,
            'tax' => 10,
        ],
    ];
});
