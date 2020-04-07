<?php

use Illuminate\Http\Request;
use App\Http\Middleware\FormatInquiryData;

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


Route::prefix('inquiries')->group(function () {
    Route::get('/', 'InquiryController@list');
    Route::post('/', 'InquiryController@store')->middleware(FormatInquiryData::class);
    Route::get('{inquiry}', 'InquiryController@show');
    Route::post('{inquiry}', 'InquiryController@update');
    Route::delete('{inquiry}', 'InquiryController@delete');
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
