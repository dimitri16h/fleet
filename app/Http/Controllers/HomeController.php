<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = \App\User::where('id', \Auth::user()->id)->first();
        // $companies = $user->companies()->get();

        $companies = \App\User::where('id', \Auth::user()->id)->first()->companies()->orderBy('id')->get();
                
        return view('dashboard', compact('companies'));
    }
}
