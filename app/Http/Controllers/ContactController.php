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
                $allContacts = Contact::orderBy('first_name','asc')->where(
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
        return view('contacts.create');
    }
    public function show($id){
        $contact = Contact::find($id);
        // return $contact;
        return view('contacts.singleContact', ['contact'=>$contact]);
    }
    public function store(Request $request){}

    public function edit($id){}
    public function update(Request $request, $id){}
    public function destroy($id){}
}
