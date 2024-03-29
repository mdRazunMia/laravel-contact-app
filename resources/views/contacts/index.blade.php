
@extends('layouts.main')

@section('title', 'Contact App | All Contacts')

@section('content')
      <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                   @if ($message = session('message'))
                    <div class="alert alert-success text-center">{{ $message }}</div>
                    @endif
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Contacts</h2>
                    <div class="ml-auto">
                      <a href="{{ route('contacts.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
               @include('contacts._filter')
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Company</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if ($allContacts->count())
                    @foreach ($allContacts as $index => $contact)
                     <tr>
                      <th scope="row">{{ $index + $allContacts->firstItem()}}</th>
                      <td>{{ $contact->first_name }}</td>
                      <td>{{ $contact->last_name }}</td>
                      <td>{{ $contact->email }}</td>
                      <td>{{ $contact->address }}</td>
                      <td width="150">
                        <a href="{{ route('contacts.show', $contact->id)}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('contacts.destroy', $contact->id) }}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete" ><i class="fa fa-times"></i></a>
                      </td>
                    </tr>

                    {{-- handled by vanila javascript. Code in the public/js/app.js directory --}}
                   @endforeach
                   <form id="form-delete" method="POST", style="display: none">
                    @csrf
                    @method('DELETE')
                   </form>
                   @endif
                  </tbody>
                </table>
                {{ $allContacts->withQueryString()->links('pagination::bootstrap-5') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
