<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoadsController extends Controller
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
            $company->loads = $company->loads()->orderBy('id')->get();
        }
        return view('loads.index', compact('userCompanies'));
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
        return view('loads.create',compact('company'));
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
        $customerName = $request->input('customer');
        if ($customerName != "Select from Current...") {
            $customer = $company->customers()->where('name', $customerName)->first();
            $customerId = $customer->id;
        }
        else $customerId = null;

        if (\Auth::user()->id == $company->owner_id) {
            $load = new \App\Load;
            $load->company_id = $company->id;
            $load->customer_id = $customerId;
            $load->internal_number = $request->input('orderNum');
            if ($request->input('external')) $load->external_number = $request->input('external');
            if ($request->input('pickup1')) $load->pickup_address1 = $request->input('pickup1');
            if ($request->input('pickup2')) $load->pickup_address2 = $request->input('pickup2');
            if ($request->input('dropoff1')) $load->dropoff_address1 = $request->input('dropoff1');
            if ($request->input('dropoff2')) $load->dropoff_address2 = $request->input('dropoff2');
            if ($request->input('rate')) $load->rate = ($request->input('rate'))*100;
            $load->save();
        }
        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $load = \App\Load::find($id);
        $company = \App\Company::find($load->company_id);
        $customer = \App\Customer::find($load->customer_id);
        if (!$load->description && $load->pickup_address2 && $load->dropoff_address2) {
            $formattedPickup = preg_replace('/\d/', '', $load->pickup_address2);
            $formattedPickup = rtrim($formattedPickup, ', ');
            $formattedDropoff = preg_replace('/\d/', '', $load->dropoff_address2);
            $formattedDropoff = rtrim($formattedDropoff, ', ');
            $description = $formattedPickup . ' to ' . $formattedDropoff;
            $load->tempdescription = $description;
        }
        if ($load->company()->first()->owner_id == \Auth::user()->id) {
            return view('loads.show', compact('load', 'company', 'customer'));
        }
        else return redirect('/orders');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $load = \App\Load::find($id);
        $company = $load->company()->first();
        $customer = \App\Customer::find($load->customer_id);
        if ($customer) {
            $customerName = $customer->name;
        }
        else $customerName = "Select One:";
        return view('loads.edit', compact('load', 'company', 'customerName'));
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
        $customerName = $request->input('customer');
        if ($customerName != "Select One:") {
            $customer = \App\Customer::where('name', $customerName)->first();
            $customerId = $customer->id;
        }
        else $customerId = null;
        $load = \App\Load::find($id);
        if ($load->company()->first()->owner_id == \Auth::user()->id) {
            $load->company_id = $load->company()->first()->id;
            $load->customer_id = $customerId;
            $load->internal_number = $request->input('orderNum');
            $load->external_number = $request->input('external');
            $load->pickup_address1 = $request->input('pickup1');
            $load->pickup_address2 = $request->input('pickup2');
            $load->dropoff_address1 = $request->input('dropoff1');
            $load->dropoff_address2 = $request->input('dropoff2');
            $load->rate = ($request->input('rate'))*100;
            $load->description = ($request->input('description'));
            $load->save();
        }
        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $load = \App\Load::find($id);
        $company = $load->company()->first();
        if (\Auth::user()->id == $company->owner_id) {

            $load->delete();
        }
        return redirect('/orders');
    }
}
