@extends('layouts.app')
@section('page-title', 'Reset Password')

@section('content')
<div class="reset-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div>
                    <img src="/img/LACED-Agency-logo_2x-300x65.png" alt="Logo" />
                </div>

                <h2>
                    <span>Smart</span><span>Landing</span>
                    <span>Page System</span>
                </h2>
                <div>
                    <p>Enter your email address below and we'll send you password reset instructions.</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Enter your email address..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send me reset instructions') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
