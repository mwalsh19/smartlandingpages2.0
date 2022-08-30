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
    <div class="uper col-md-12">
      <div class="">
        <table class="table table-striped datatablesSimple">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Zip Code</th>
              <th>State</th>
              <th>Referral Code</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($applicants as $applicant)
            <tr>
              <td>{{$applicant->first_name}}</td>
              <td>{{$applicant->last_name}}</td>
              <td>{{$applicant->email}}</td>
              <td>{{$applicant->phone_number}}</td>
              <td>{{$applicant->zip}}</td>
              <td>{{$applicant->state}}</td>
              <td>{{$applicant->referral_code}}</td>
              <td>
                <a href="{{ route('applicants.show', $applicant->id)}}" class="btn btn-primary"><i
                    class="fas fa-eye"></i>&nbsp;View</a>
                <form action="{{ route('applicants.destroy', $applicant->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>&nbsp;Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection