<?php

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// // Route::get('/companies',[CompainiesController::class, 'index']);
// Route::resource('/companies',CompainiesController::class);

// Route::get('/contacts', function(){
//     return Contact::all();
// });

// Route::get('/contacts/create', function(Request $request){

//     $company= Company::first();
//     $contact = new Contact;
//     $contact->first_name = "Bappi";
//     $contact->last_name = "Haque";
//     $contact->phone = "01779580666";
//     $contact->email = "bappi@gmail.com";
//     $contact->address = "khulna";
//     $contact->company_id = $company->id;
//     $contact->save();
//     return "New contact has been added into contacts table.";
// });

// Route::get('/contacts/{id}', function($id){
//     return Contact::find($id);
// });


// ---------------------------------------------------------------


// name route

// Route::get('/contacts', function(){
//     return Contact::all();
// })->name('contacts.index');

// Route::get('/home',[HomeController::class, 'index'])->name('home.welcome');

Route::get('/', function(){
    return view('welcome');
});
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create',[ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts',[ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{id}',[ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{id}/edit',[ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{id}',[ContactController::class, 'destroy'])->name('contacts.destroy');




Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create',[CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies',[CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/{id}',[CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{id}/edit',[CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');
Route::delete('/companies/{id}',[CompanyController::class, 'destroy'])->name('companies.destroy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
