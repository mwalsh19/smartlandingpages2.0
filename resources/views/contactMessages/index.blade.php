@extends('layouts.dashboard')
@section('page-title', 'Contact Form Messages')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Contact Form Messages</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active">Messages</li>
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
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Subject</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($contacts as $contact)
          <tr>
              <td>{{$contact->id}}</td>
              <td>{{$contact->name}}</td>
              <td>{{$contact->email}}</td>
              <td>{{$contact->phone}}</td>
              <td>{{$contact->subject}}</td>
              <td><a href="{{ route('contactMessages.view', $contact->id)}}" class="btn btn-primary">View</a></td>
              <td>
                  <form action="{{ route('contactMessages.destroy', $contact->id)}}" method="post">
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