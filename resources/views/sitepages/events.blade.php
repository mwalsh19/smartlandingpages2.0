@extends('layouts.app')
@section('page-title', 'Our Events')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Country Name</td>
          <td>Symptoms</td>
          <td>Cases</td>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->name}}</td>
            <td>{{$event->location}}</td>
            <td>{{$event->description}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection