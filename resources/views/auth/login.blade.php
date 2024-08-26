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
                                    <h5 class="text-center mb-4">{{ __('Login') }}</h5>
                                    <form method="POST" action="{{ route('login') }}" class="contactForm">
                                        @csrf
                                        <div class="form-group">
                                            <label class="label-form" for="email">{{ __('Email') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="label-form" for="password">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="label-form" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sb btn-block">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                        <div class="form-group text-center">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="form-group text-center mt-4">
                                            <p>Or login with:</p>
                                            <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">
                                                <i class="fa fa-facebook"></i> Login with Facebook
                                            </a>
                                            <a href="{{ route('login.google') }}" class="btn btn-danger btn-block">
                                                <i class="fa fa-google"></i> Login with Google
                                            </a>
                                        </div>
                                        <div class="form-group text-center">
                                            <a class="btn btn-link" href="{{ route('register') }}">
                                                {{ __('Sign Up') }}
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
