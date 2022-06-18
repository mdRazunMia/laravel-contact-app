@extends('layouts.main')

@section('title', 'Contact App | Edit Company')

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Edit Company</strong>
              </div>
             <form action="{{ route('companies.update', $company->id) }}" method="POST">
                 @csrf
                 @method('PUT')
                 @include('companies._editForm')
             </form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
