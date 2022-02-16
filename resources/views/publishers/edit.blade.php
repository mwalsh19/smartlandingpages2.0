@extends('layouts.dashboard')
@section('page-title', 'Edit Publisher')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Publisher</h1>
                        <ol class="breadcrumb mb-4">
                          <li class="breadcrumb-item">Publishers</li>
                          <li class="breadcrumb-item active">Edit</li>
                        </ol>
<div class="container">
  <div class="card uper col-md-10">
    <div class="card-header">
      Edit Publisher Data
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
        <form method="post" action="{{ route('publishers.update', $publisher->id ) }}"> 
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="publisher">Publisher:</label>
                <input type="text" class="form-control" name="publisher" value="{{ $publisher->publisher }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update Publisher</button>
            <a class="btn btn-primary" href="{{ route('publishers.index') }}">Cancel</a>
        </form>
    </div>
  </div>
</div>
@endsection