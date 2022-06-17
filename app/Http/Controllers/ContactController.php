<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        // $allContacts = Contact::all();
        // $allContacts = Contact::orderBy('first_name','asc')->get();
        $allContacts = Contact::orderBy('first_name','asc')->paginate(2);
        // return view('contacts.index',['contacts'=>$allContacts]);
        return view('contacts.index',compact('allContacts'));

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
