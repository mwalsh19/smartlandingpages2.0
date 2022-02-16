@extends('layouts.dashboard')
@section('page-title', 'Edit Client')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Client</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item">Client</li>
                          <li class="breadcrumb-item active">Edit</li>
                        </ol>
<div class="container">
  <div class="card uper col-md-10">
    <div class="card-header">
      Edit Client Data
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
        <form method="post" action="{{ route('clients.update', $client->id ) }}"> 
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $client->name }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update Client</button>
            <a class="btn btn-primary" href="{{ route('clients.index') }}">Cancel</a>
        </form>
    </div>
  </div>
</div>
@endsection