<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $companies = Company::orderBy('name')->pluck('name','id')->prepend("All Companies", '');
        // $allContacts = Contact::all();
        // $allContacts = Contact::orderBy('first_name','asc')->get();
        // $allContacts = Contact::orderBy('first_name','asc')->paginate(2); return ordered data
                $allContacts = Contact::orderBy('id','desc')->where(
                    function($query){
                        if($companyId = request('company_id')){
                            $query->where('company_id',$companyId );
                        }
                    }
                )->paginate(2);
        // return view('contacts.index',['contacts'=>$allContacts]);
        return view('contacts.index',compact('allContacts', 'companies'));

    }
    public function create(){
        $companies = Company::orderBy('name')->pluck('name','id')->prepend("All Companies", '');
        return view('contacts.create', compact('companies'));
    }
    public function show($id){
        $contact = Contact::findOrFail($id);
        // return $contact;
        return view('contacts.singleContact', ['contact'=>$contact]);
    }
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|email",
            'address' => "required",
            'company_id' => "required|exists:companies,id",// does it exist in company table or not and id is the primary key
        ]);

       Contact::create($request->all()); // mass assignment

    //    return redirect('/contacts');

    return redirect()->route('contacts.index')->with('message', "Contact has been added successfully.");

    }

    public function edit($id){
        $contact = Contact::findOrFail($id);
        $companies = Company::orderBy('name')->pluck('name','id')->prepend("All Companies", '');
        return view('contacts.edit', compact('companies', 'contact'));
    }
    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'first_name' => "required",
            'last_name' => "required",
            'email' => "required|email",
            'address' => "required",
            'company_id' => "required|exists:companies,id",// does it exist in company table or not and id is the primary key
        ]);

       Contact::updated($request->all()); // mass assignment

    //    return redirect('/contacts');

    return redirect()->route('contacts.index')->with('message', "Contact has been updated successfully.");
    }
    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('message', 'Contact has been deleted successfully');
    }
}
