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
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::middleware([\App\Http\Middleware\LocaleMiddleware::class])->group(function() {
    Route::get('/{locale}', 'App\Http\Controllers\GeneralController@index')->name('home');
    Route::get('/{locale}/pharmacy/{slug}', 'App\Http\Controllers\PharmacyController@getPharmacy')->name('single-pharmacy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
