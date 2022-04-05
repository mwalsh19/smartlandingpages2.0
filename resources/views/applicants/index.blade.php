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
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif
    @if(session()->get('error'))
      <div class="alert alert-warning">
        {{ session()->get('error') }}  
      </div><br />
    @endif
    <table class="table table-striped" id="datatablesSimple">
      <thead>
          <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Zip Code</td>
            <td>Tenstreet</td>
            <td>Referral Code</td>
            <td colspan="2">Action</td>
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
              <td>{{$applicant->tenstreet === 1 ? 'Submitted' : 'Not Submitted'}}</td>
              <td>{{$applicant->referral_code}}</td>
              <td>
                <a href="{{ route('applicants.show', $applicant->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                  <form action="{{ route('applicants.tenstreet', $applicant->id)}}" method="post">
                    @csrf
                    @method('POST')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-upload"></i></button>
                  </form>
                  <form action="{{ route('applicants.destroy', $applicant->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>
</div>
@endsection