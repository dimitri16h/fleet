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

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/companies', 'CompaniesController');
Route::resource('/trucks', 'TrucksController');
Route::resource('/customers', 'CustomersController');

Route::post('/set-active', function(Request $request) {
	$activeCo = \App\Company::find($request->input('active-co'));
	if (!$activeCo) {
		$activeCo = new \App\Company;
		$activeCo->id = null;
		$activeCo->name = "All Companies";
	}
	session(['active-name' => $activeCo->name]);
	session(['active-id' => $activeCo->id]);
	return back();
});

Route::get('test', function() {
	$companies = \App\User::where('id', \Auth::user()->id)->first()->companies()->get();
	return view('test', compact('companies'));
});