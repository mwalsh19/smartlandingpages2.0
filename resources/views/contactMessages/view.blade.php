@extends('layouts.dashboard')
@section('page-title', $contact->subject . ' - Message')

@section('content')
            <div class="jumbotron">
              <h1 class="display-4">{{ $contact->subject }}</h1>
              <p class="lead">{{ $contact->name }} ({{ $contact->email }}) - {{ $contact->phone }}</p>
              <hr class="my-4">
              <p>{{ $contact->message }}</p>
              <p>{{ $contact->created_at }}</p>
              <p class="lead">
                <a class="btn btn-primary" href="{{ route('contactMessages.index') }}">Back</a>
                <form action="{{ route('contactMessages.destroy', $contact->id)}}" method="post">
                      @csrf 
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </p>
            </div>
@endsection 