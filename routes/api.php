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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([\App\Http\Middleware\CustomAuthMiddleware::class])->group(function() {
    //CRUD Pharmacies
    Route::get('/pharmacies', '\App\Http\Controllers\PharmacyController@getPharmaciesAPI')->name('pharmacy.getAll');
    Route::post('/pharmacy/delete/{slug}', '\App\Http\Controllers\PharmacyController@deletePharmacyAPI')->name('pharmacy.delete');
    Route::post('/pharmacy/update/{slug}', '\App\Http\Controllers\PharmacyController@updatePharmacyAPI')->name('pharmacy.update');
    Route::post('/pharmacy/create', '\App\Http\Controllers\PharmacyController@addPharmacyAPI')->name('pharmacy.create');
});
