@extends('layouts.app')
@section('page-title', 'Contact Us')

@section('content')

        <div class="">
            <!-- Success message -->
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            

            <div class="container contact-form">
                        <div class="contact-image">
                            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
                        </div>
                        <form method="post" action="{{ route('contact.store') }}">
                            @csrf
                            <h3>Drop Us a Message</h3>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'error' : '' }}" placeholder="Your Name *" value="{{ old('name') }}" />
                                        <!-- Error -->
                                        @if ($errors->has('name'))
                                        <div class="error">
                                            {{ $errors->first('name') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="Your Email *" value="{{ old('email') }}" />
                                        <!-- Error -->
                                        @if ($errors->has('email'))
                                        <div class="error">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'error' : '' }}" placeholder="Your Phone Number *" value="{{ old('phone') }}" />
                                        <!-- Error -->
                                        @if ($errors->has('phone'))
                                        <div class="error">
                                            {{ $errors->first('phone') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control {{ $errors->has('subject') ? 'error' : '' }}" placeholder="Subject" value="{{ old('subject') }}" />
                                        <!-- Error -->
                                        @if ($errors->has('subject'))
                                        <div class="error">
                                            {{ $errors->first('subject') }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control {{ $errors->has('message') ? 'error' : '' }}" placeholder="Your Message *" style="width: 100%; height: 150px;">{{ old('message') }}</textarea>
                                        <!-- Error -->
                                        @if ($errors->has('message'))
                                        <div class="error">
                                            {{ $errors->first('message') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
        </div>

@endsection
