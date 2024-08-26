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
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="label" for="email">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sb btn-block">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                    <div class="form-group text-center">
                                        <a class="btn btn-link" href="{{ route('login') }}">
                                            {{ __('Back To Login') }}
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
