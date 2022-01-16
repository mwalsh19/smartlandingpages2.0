@extends('layouts.dashboard')
@section('page-title', 'Create Event')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Create Event</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item">Events</li>
                          <li class="breadcrumb-item active">Create</li>
                        </ol>
<div class="container">
  <div class="card uper col-md-10">
    <div class="card-header">
      Add New Event
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
        <form method="post" action="{{ route('events.store') }}">
            <div class="form-group">
                @csrf
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" name="location"/>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea rows="5" columns="5" class="form-control" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
            <a class="btn btn-primary" href="{{ route('events.index') }}">Cancel</a>
        </form> 
    </div>
  </div> 
</div>
@endsection