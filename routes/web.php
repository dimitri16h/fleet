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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/companies', 'CompaniesController');

Route::get('test', function() {
	$companies = \App\User::where('id', \Auth::user()->id)->first()->companies()->get();
	return view('test', compact('companies'));
});