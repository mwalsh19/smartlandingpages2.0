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
      <table class="table table-striped datatablesSimple">
        <thead>
          <tr>
            <th>Publisher</th>
            <th>Referral Code</th>
            <th>Phone Number</th>
            <th>Path</th>
            <th>Created</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($landingPages as $landingPage)
          <tr>
            <td>{{$landingPage->publisher}}</td>
            <td>{{$landingPage->referral_code}}</td>
            <td>{{$landingPage->phone}}</td>
            <td>{{$landingPage->path}}/{{$landingPage->publisher}}/{{$landingPage->name}}</td>
            <td>{{$landingPage->created_at}}</td>
            <td>
              <div class="inline">
                <div class="">
                  <a target="_blank"
                    href="{{$landingPage->website}}landing-pages/{{$landingPage->path}}/{{$landingPage->publisher}}/{{$landingPage->name}}?preview=true"
                    class="btn btn-primary">
                    <i class="fas fa-eye"></i>&nbsp;Preview
                  </a>
                </div>
                <div class="">
                  <a href="{{ route('landing-pages.edit', $landingPage->id)}}" class="btn btn-primary"><i
                      class="fas fa-edit"></i>&nbsp;Edit</a>
                </div>
              </div>
              <div class="inline">
                <div class="">
                  <form action="{{ route('landing-pages.clone', $landingPage->id)}}" method="post">
                    @csrf
                    @method('POST')
                    <button class="btn btn-primary" type="submit"><i class="fas fa-copy"></i>&nbsp;Clone</button>
                  </form>
                </div>
                <div class="">
                  <form action="{{ route('landing-pages.destroy', $landingPage->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>&nbsp;Delete</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('landing-pages.create')}}" class="btn btn-primary">New</a>
      <div>
      </div>
      @endsection