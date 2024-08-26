@extends('auth.layout.auth_layout')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-12 col-md-12 d-flex align-items-center">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h5 class="text-center mb-4">{{ __('Reset Password') }}</h5>
                                <form method="POST" action="{{ route('password.update') }}" class="contactForm">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <label class="label-form" for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="label-form" for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="label-form" for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sb btn-block">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                    <div class="form-group text-center">
                                        <a class="btn btn-link" href="{{ route('login') }}">
                                            {{ __('Back To Sign In') }}
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
