@extends('layouts.dashboard')
@section('page-title', 'Landing Pages')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Landing Pages</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item active">Landing Pages</li>
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
            <td>Title</td>
            <td>Path</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($landingPages as $landingPage)
          <tr>
              <td>{{$landingPage->id}}</td>
              <td>{{$landingPage->title}}</td>
              <td>{{$landingPage->path}}</td>
              <td><a href="{{ route('landing-pages.edit', $landingPage->id)}}" class="btn btn-primary">Edit/View</a></td>
              <td>
                  <form action="{{ route('landing-pages.destroy', $landingPage->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach 
      </tbody>
    </table>
    <a href="{{ route('landing-pages.create')}}" class="btn btn-primary">New</a>
  <div>
</div>
@endsection