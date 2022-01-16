@extends('layouts.dashboard')
@section('page-title', 'Events')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Events</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active">Events</li>
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
            <td>Location</td>
            <td>Description</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($events as $event)
          <tr>
              <td>{{$event->id}}</td>
              <td>{{$event->name}}</td>
              <td>{{$event->location}}</td>
              <td>{{$event->description}}</td>
              <td><a href="{{ route('events.edit', $event->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('events.destroy', $event->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <a href="{{ route('events.create')}}" class="btn btn-primary">Create</a>
  <div>
</div>
@endsection