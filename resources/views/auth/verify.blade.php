@extends('layouts.app')
@section('page-title', 'Verify Email Address')

@section('content')
<div class="verify-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div>
                        <img src="/img/LACED-Agency-logo_2x-300x65.png" alt="Logo" />
                    </div>

                    <h2>
                        <span>Smart</span><span>Landing</span>
                        <span>Page System</span>
                    </h2>
                    <h4>Verify Your Email Address</h4>


                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn align-baseline">{{ __('Click here to request another') }}</button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
