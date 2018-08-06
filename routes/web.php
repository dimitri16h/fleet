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
Route::resource('/orders', 'LoadsController');

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

Route::get('/invoice', function(Request $request) {
	$load = \App\Load::find($request->input('load_id'));
	$company = $load->company()->first();
	if ($load->customer_id) {
		$customer = \App\Customer::find($load->customer_id);
	}
	else $customer = new \App\Customer;
	if (!$load->description && $load->pickup_address2 && $load->dropoff_address2) {
		$formattedPickup = preg_replace('/\d/', '', $load->pickup_address2);
		$formattedPickup = rtrim($formattedPickup, ', ');
		$formattedDropoff = preg_replace('/\d/', '', $load->dropoff_address2);
		$formattedDropoff = rtrim($formattedDropoff, ', ');
		$description = $formattedPickup . ' to ' . $formattedDropoff;
		$load->description = $description;
	}
	if (!$load->total) $load->total = $load->rate;
	
	if ($company->owner_id == \Auth::user()->id) {
		return view('invoice', compact('load', 'company', 'customer'));
	}
	else return back();
});