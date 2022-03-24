@extends('layouts.dashboard')
@section('page-title', 'View Applicant')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">View Applicant</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item">Applicant</li>
                          <li class="breadcrumb-item active">View</li>
                        </ol>
<div class="container">
  <div class="card uper col-md-10">
    <div class="card-header">
      Applicant Data
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <div class="applicant-view">
	        <div>
	           	<p>Name: {{ $applicant->first_name }} {{ $applicant->last_name }}</p>
	        </div>
	        <div>
	           	<p>Email: {{ $applicant->email }}</p>
	        </div>
	        <div>
	           	<p>Phone Number: {{ $applicant->phone_number }}</p>
	        </div>
	        <div>
	           	<p>Address:</p>
	           	<p>{{ $applicant->address }}<br />{{ $applicant->city }}, {{ $applicant->state }}, {{ $applicant->zip }}</p>
	        </div>
	        <div>
	           	<p>Experience: {{ $applicant->experience }}</p>
	        </div>
	        <div>
	           	<p>Has CDL: {{ $applicant->cdl === 1 ? 'Yes' : 'No' }}</p>
	        </div>
	        <div>
	           	<p>Sent Applicant to TenStreet: {{ $applicant->tenstreet === 0 ? 'Not Submitted' : 'Submitted' }}</p>
	        </div>
	    </div>
      	<a class="btn btn-primary" href="{{ route('applicants.index') }}">Back</a>
    </div>
  </div>
</div>
@endsection