<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

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
Route::put('/update/{id}','categoriesQuery@update');
Route::get('/','categoriesQuery@showAll')->name('home');
Route::post('/save','categoriesQuery@store');
Route::post('testRequest','testRequest@test');
Route::delete('/delete/{id}','categoriesQuery@destroy');
Route::get('/cache', function(){
    return Cache::get('key');
});