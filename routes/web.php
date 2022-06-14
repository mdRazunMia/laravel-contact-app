<?php

use App\Http\Controllers\CompainiesController;
use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/companies',[CompainiesController::class, 'index']);
Route::resource('/companies',CompainiesController::class);

Route::get('/contacts', function(){
    return Contact::all();
});

Route::get('/contacts/create', function(Request $request){

    $company= Company::first();
    $contact = new Contact;
    $contact->first_name = "Bappi";
    $contact->last_name = "Haque";
    $contact->phone = "01779580666";
    $contact->email = "bappi@gmail.com";
    $contact->address = "khulna";
    $contact->company_id = $company->id;
    $contact->save();
    return "New contact has been added into contacts table.";
});

Route::get('/contacts/{id}', function($id){
    return Contact::find($id);
});
