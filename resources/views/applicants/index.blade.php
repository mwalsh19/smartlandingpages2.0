@extends('layouts.dashboard')
@section('page-title', 'Applicants')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Applicants</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active">Applicants</li>
                        </ol>
<div class="container">
  <div class="uper col-md-10">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Experience</td>
            <td>CDL</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($applicants as $applicant)
          <tr>
              <td>{{$applicant->id}}</td>
              <td>{{$applicant->first_name}}</td>
              <td>{{$applicant->last_name}}</td>
              <td>{{$applicant->email}}</td>
              <td>{{$applicant->phone_number}}</td>
              <td>{{$applicant->experience}}</td>
              <td>{{$applicant->cdl === 1 ? 'Yes' : 'No'}}</td>
              <td>
                  <form action="{{ route('applicants.destroy', $applicant->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
</div>
@endsection