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
    return view('landing');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dispatch', function () {
    return view('dispatch');
});

Route::get('/trucks', function () {
    return view('trucks');
});

Route::get('/customers', function () {
    return view('customers');
});

Auth::routes();


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
