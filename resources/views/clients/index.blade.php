@extends('layouts.dashboard')
@section('page-title', 'Clients')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Clients</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active">Clients</li>
                        </ol>
<div class="container">
  <div class="uper col-md-12">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif
    <table class="table table-striped" id="datatablesSimple">
      <thead>
          <tr>
            <td>Name</td>
            <td>Logo</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($clients as $client)
          <tr>
              <td>{{$client->name}}</td>
              <td><img src="/uploads/logos/{{ $client->logo }}" alt="{{$client->name}}"></td>
              <td>
                <a href="{{ route('clients.edit', $client->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('clients.destroy', $client->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <a href="{{ route('clients.create')}}" class="btn btn-primary">Create</a>
  <div>
</div>
@endsection