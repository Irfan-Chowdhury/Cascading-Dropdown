<?php

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

Route::get('/', function () {
    return view('welcome');
});

// https://investmentnovel.com/laravel-dependent-dropdown-tutorial-with-example/

Route::get('dropdownlist','DataController@getCountries');
Route::get('dropdownlist/getstates/{id}','DataController@getStates');
Route::post('dropdownlist/store','DataController@store')->name('dropdown.store');