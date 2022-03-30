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
<div class="container-wide">
  <div class="uper col-md-12">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif
    <table class="table table-striped" id="datatablesSimple">
      <thead>
          <tr>
            <td>Publisher</td>
            <td>Referral Code</td>
            <td>Phone Number</td>
            <td>Path</td>
            <td>Created</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($landingPages as $landingPage)
          <tr>
              <td>{{$landingPage->publisher}}</td>
              <td>{{$landingPage->referral_code}}</td>
              <td>{{$landingPage->phone}}</td>
              <td>{{$landingPage->path}}/{{$landingPage->publisher}} </td>
              <td>{{$landingPage->created_at}}</td>
              <td>
                <a href="{{ route('landing-pages.edit', $landingPage->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                <form action="{{ route('landing-pages.clone', $landingPage->id)}}" method="post">
                    @csrf
                    @method('POST')
                    <button class="btn btn-primary" type="submit"><i class="fas fa-copy"></i></button>
                </form>
                <form action="{{ route('landing-pages.destroy', $landingPage->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
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