<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrucksController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = \App\User::where('id',\Auth::user()->id)->first();
        if(session('active-id')) {
            $userCompanies = $user->companies()->where('id',session('active-id'))->get();
        }
        else {$userCompanies = $user->companies()->orderBy('id')->get();}
        
        foreach ($userCompanies as $company) {
            $company->customers = $company->customers()->orderBy('id')->get();
        }
        return view("trucks.index", compact('userCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $companyid = $request->input('companyid');
        $company = \App\Company::where('id', $companyid)->first();
        return view('trucks.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = \App\Company::where('id',$request->input('companyid'))->first();

        if (\Auth::user()->id == $company->owner_id) {
            $truck = new \App\Truck;
            $truck->name = $request->input('namefield');
            $truck->company_id = $company->id;
            $truck->save();
        }
        return redirect('/trucks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truck = \App\Truck::find($id);
        return view('trucks.edit', compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $truck = \App\Truck::find($id);
        if ($truck->company()->first()->owner_id == \Auth::user()->id) {
            $truck->name = $request->input('namefield');
            $truck->save();
        }
        return redirect('/trucks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $truck = \App\Truck::find($id);
        $company = $truck->company()->first();
        if (\Auth::user()->id == $company->owner_id) {

            $truck->delete();
        }
        return redirect('/trucks');
    }
}
