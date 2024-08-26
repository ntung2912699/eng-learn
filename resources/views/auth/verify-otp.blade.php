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
                                    <h5 class="text-center mb-4">{{ __('Verify OTP') }}</h5>
                                    @if ($errors->has('otp'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('otp') }}
                                        </div>
                                    @endif
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('registerVerifyOtp') }}" id="otp-form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="label-form" for="otp">{{ __('Enter OTP') }}</label>
                                            <a class="btn btn-link" href="{{ route('resend-otp') }}">
                                                {{ __('Resend OTP') }}
                                            </a>
                                            <input id="otp" type="text" class="form-control @if ($errors->has('otp')) is-invalid @endif" name="otp" value="{{ old('otp') }}" autocomplete="off" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sb btn-block">
                                                {{ __('Submit') }}
                                            </button>
                                        </div>
                                        <div class="form-group text-center">
                                            <a class="btn btn-link" href="{{ route('register') }}">
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
