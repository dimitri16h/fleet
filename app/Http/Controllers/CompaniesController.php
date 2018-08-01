<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = \App\Company::where("owner_id", \Auth::user()->id)->get();
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
        $company->name = $request->input('companyName');
        $company->owner_id = $request->user()->id;
        $company->save();

        //Update the pivot table as well
        $company->users()->attach($company->owner_id);

        $request->session()->flash('status', 'Company added!');
        return redirect()->route('home');
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
    public function edit(Request $request, $id)
    {
        $company = \App\Company::where('id', $id)->first();
        if ($company->owner_id == \Auth::user()->id) {
            return view('companies.edit', compact('company'));
        }
        else return ('You didn\'t build that!');
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
            $company->name = $request->namefield;
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
        //
    }
}
