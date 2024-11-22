<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', 'App\Http\Controllers\BasicController@index')->name('start');
Route::get('/recipient', 'App\Http\Controllers\BasicController@recipient')->name('recipient');
Route::post('/store', 'App\Http\Controllers\BasicController@store')->name('store');
