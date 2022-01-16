@extends('layouts.app')
@section('page-title', 'About Us')

@section('content')

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="jumbotron">
              <h1 class="display-4">Hello, world!</h1>
              <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
              <hr class="my-4">
              <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
              <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
              </p>
            </div>
        </div>

@endsection
