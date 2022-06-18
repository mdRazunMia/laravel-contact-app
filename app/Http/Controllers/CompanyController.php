<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('name','asc')->paginate(2);
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

        $request->validate([
            'name' => "required",
            'address' => "required",
            'email' => "required|email",
            'website' => "required",// does it exist in company table or not and id is the primary key
        ]);

        $company = new Company();

        $company->name = $request->name;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->save();

        return redirect()->route('companies.index')->with('message', 'Company has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.singleCompany',compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);

        return view('companies.edit', compact('company'));
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

        $request->validate([
            'name' => "required",
            'address' => "required",
            'email' => "required|email",
            'website' => "required",// does it exist in company table or not and id is the primary key
        ]);

        $company = Company::find($id);

        $company->name = $request->name;
        $company->address = $request->address;
        $company->website = $request->website;
        $company->email = $request->email;
        $company->update();

        return redirect()->route('companies.index')->with('message', 'Company has been updated successfully');
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
