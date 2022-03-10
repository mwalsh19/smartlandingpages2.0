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
        <form method="post" action="{{ route('clients.update', $client->id ) }}" enctype="multipart/form-data"> 
          @csrf
          @method('PATCH')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $client->name }}"/>
            </div>
            <div class="form-group">
                <label for="name">Website:</label>
                <input type="text" class="form-control" name="website" id="website" value="{{ $client->website }}"/>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <label for="logo">Logo:</label><br />
                  <img src="/uploads/logos/{{ $client->logo }}" style="width:100px; height:100px;">
                  <input type="file" name="logo" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                  <label for="description">Description:</label><br />
                  <textarea class="form-control" id="description" name="description">{{ $client->description }}</textarea>
              </div>
            </div>
            <h3>Color Scheme</h3>
            <div class="row">
              <div class="col-md-6">
                  <label for="color_scheme_headline">Headline:</label>
                  <input type="text" class="form-control" name="color_scheme_headline" id="color_scheme_headline" value="{{ $client->color_scheme_headline }}" maxlength="7" />
              </div>
              <div class="col-md-6">
                  <label for="color_scheme_sub_headline">Sub Headline:</label>
                  <input type="text" class="form-control" name="color_scheme_sub_headline" id="color_scheme_sub_headline" value="{{ $client->color_scheme_sub_headline }}" maxlength="7" />
              </div>
              <div class="col-md-6">
                  <label for="color_scheme_body_copy">Body Copy:</label>
                  <input type="text" class="form-control" name="color_scheme_body_copy" id="color_scheme_body_copy" value="{{ $client->color_scheme_body_copy }}" maxlength="7" />
              </div>
              <div class="col-md-6">
                  <label for="color_scheme_accent">Accent:</label>
                  <input type="text" class="form-control" name="color_scheme_accent" id="color_scheme_accent" value="{{ $client->color_scheme_accent }}" maxlength="7" />
              </div>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Update Client</button>
            <a class="btn btn-primary" href="{{ route('clients.index') }}">Cancel</a>
        </form>
    </div>
  </div>
</div>
@endsection