@extends('layouts.dashboard')
@section('page-title', 'Users')

@section('content')
<style>
.uper {
  margin-top: 40px;
}
</style>
<div class="container-fluid px-4">
  <h1 class="mt-4">Users</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">users</li>
  </ol>
  <div class="container">
    <div class="uper col-md-12">
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
      @endif
      @if(session()->get('error'))
      <div class="alert alert-danger">
        {{ session()->get('error') }}
      </div><br />
      @endif
      <table class="table table-striped datatablesSimple">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>@if($user->email_verified_at) Yes @else No @endif</td>
            <td>@if($user->is_active === 1) Active @else Blocked @endif</td>
            <td>
              <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary"><i
                  class="fas fa-edit"></i>&nbsp;Edit</a>
              <form action="{{ route('users.destroy', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>&nbsp;Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('users.create')}}" class="btn btn-primary">Create</a>
      <div>
      </div>
      @endsection