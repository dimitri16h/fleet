<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
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
        return view("customers.index", compact('userCompanies'));
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
        return view('customers.create',compact('company'));
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
            $customer = new \App\Customer;
            $customer->company_id = $company->id;
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->address1 = $request->input('address1');
            $customer->address2 = $request->input('address2');
            $customer->billing_name = $request->input('billingName');
            $customer->billing_address1 = $request->input('billingAddress1');
            $customer->billing_address2 = $request->input('billingAddress2');
            $customer->save();
        }
        return redirect('/customers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = \App\Customer::where('id', $id)->first();
        if ($customer->company()->first()->owner_id == \Auth::user()->id) {
            return view('customers.show', compact('customer'));
        }
        else return redirect('/customers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = \App\Customer::find($id);
        return view('customers.edit', compact('customer'));
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
        $customer = \App\Customer::find($id);
        if ($customer->company()->first()->owner_id == \Auth::user()->id) {
            $customer->company_id = $customer->company()->first()->id;
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->address1 = $request->input('address1');
            $customer->address2 = $request->input('address2');
            $customer->billing_name = $request->input('billingName');
            $customer->billing_address1 = $request->input('billingAddress1');
            $customer->billing_address2 = $request->input('billingAddress2');
            $customer->save();
        }
        return redirect('/customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = \App\Customer::find($id);
        $company = $customer->company()->first();
        if (\Auth::user()->id == $company->owner_id) {

            $customer->delete();
        }
        return redirect('/customers');
    }
}
