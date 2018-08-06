<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
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
        $companies = \App\Company::where("owner_id", \Auth::user()->id)->orderBy('id')->get();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'activityName' => 'required|unique:activities,name',
        //     'activityDescription' => 'required',
        // ]);

        $company = new \App\Company;
        $company->name = $request->input('name');
        $company->owner_id = $request->user()->id;
        $company->phone = $request->input('phone');
        $company->address1 = $request->input('address1');
        $company->address2 = $request->input('address2');
        $company->billing_name = $request->input('billingName');
        $company->billing_address1 = $request->input('billingAddress1');
        $company->billing_address2 = $request->input('billingAddress2');
        $company->contact_name = $request->input('contactName');
        $company->contact_phone = $request->input('contactPhone');
        $company->contact_email = $request->input('contactEmail');
        $company->save();

        //Update the pivot table as well
        $company->users()->attach($company->owner_id);

        $request->session()->flash('status', 'Company added!');
        return view('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = \App\Company::where('id', $id)->first();
        if ($company->owner_id == \Auth::user()->id) {
            return view('companies.show', compact('company'));
        }
        else return redirect('/companies');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $company = \App\Company::where('id', $id)->first();
        if ($company->owner_id == \Auth::user()->id) {
            return view('companies.edit', compact('company'));
        }
        else return redirect('/companies');
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
        $company = \App\Company::where('id', $id)->first();
        if ($company->owner_id == \Auth::user()->id) {
            $company->name = $request->input('name');
            $company->owner_id = $request->user()->id;
            $company->phone = $request->input('phone');
            $company->address1 = $request->input('address1');
            $company->address2 = $request->input('address2');
            $company->billing_name = $request->input('billingName');
            $company->billing_address1 = $request->input('billingAddress1');
            $company->billing_address2 = $request->input('billingAddress2');
            $company->contact_name = $request->input('contactName');
            $company->contact_phone = $request->input('contactPhone');
            $company->contact_email = $request->input('contactEmail');
            $company->save();

            $request->session()->flash('status', 'Edit Successful!');
        }
        return redirect('/companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = \App\Company::find($id);

        // If user is company owner && company has no trucks
        if ((\Auth::user()->id == $company->owner_id) 
            && (count($company->trucks()->get()) == 0)) {

            //Detach from pivot table
            $company->users()->detach($company->owner_id);

            $company->delete();
        }
        return redirect('/companies');
    }
}
