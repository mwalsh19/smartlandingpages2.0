@extends('layouts.dashboard')
@section('page-title', 'Templates')

@section('content')
<style>
.uper {
  margin-top: 40px;
}
</style>
<div class="container-fluid px-4">
  <h1 class="mt-4">Templates</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Templates</li>
  </ol>
  <div class="container">
    <div class="uper col-md-12">
      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
      @endif
      <table class="table table-striped datatablesSimple">
        <thead>
          <tr>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($templates as $template)
          <tr>
            <td>{{$template->name}}</td>
            <td>
              <a href="{{ route('templates.edit', $template->id)}}" class="btn btn-primary"><i
                  class="fas fa-edit"></i>&nbsp;Edit</a>
              <form action="{{ route('templates.destroy', $template->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>&nbsp;Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('templates.create')}}" class="btn btn-primary">Create</a>
      <div>
      </div>
      @endsection