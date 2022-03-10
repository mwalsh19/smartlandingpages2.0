@extends('layouts.dashboard')
@section('page-title', 'Publishers')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Publishers</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active">Publishers</li>
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
            <td>Publisher</td>
            <td>Pixel</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($publishers as $publisher)
          <tr>
              <td>{{$publisher->id}}</td>
              <td>{{$publisher->publisher}}</td>
              <td>{{$publisher->pixel}}</td>
              <td><a href="{{ route('publishers.edit', $publisher->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('publishers.destroy', $publisher->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <a href="{{ route('publishers.create')}}" class="btn btn-primary">Create</a>
  <div>
</div>
@endsection