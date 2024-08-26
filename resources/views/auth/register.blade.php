@extends('auth.layout.auth_layout')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-12 col-md-12 d-flex align-items-center">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h5 class="text-center mb-4">{{ __('Register') }}</h5>
                                    <form method="POST" action="{{ route('verify-otp') }}" name="contactForm" class="contactForm">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label class="label-form" for="first-name">{{ __('First Name') }}</label>
                                                <input id="first-name" type="text" class="form-control @error('first-name') is-invalid @enderror" name="first-name" value="{{ old('first-name') }}" autocomplete="first-name" autofocus>
                                                <span class="invalid-feedback" style="display: none;"></span>
                                                @error('first-name')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label class="label-form" for="last-name">{{ __('Last Name') }}</label>
                                                <input id="last-name" type="text" class="form-control @error('last-name') is-invalid @enderror" name="last-name" value="{{ old('last-name') }}" autocomplete="last-name" autofocus>
                                                <span class="invalid-feedback" style="display: none;"></span>
                                                @error('last-name')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label-form" for="email">{{ __('Email') }}</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                            <span class="invalid-feedback" style="display: none;"></span>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="label-form" for="password">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                            <span class="invalid-feedback" style="display: none;"></span>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="label-form" for="password-confirm">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                            <span class="invalid-feedback" style="display: none;"></span>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label class="label-form" for="gender">{{ __('Gender') }}</label>
                                                <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                                                    <option value="" disabled selected>{{ __('Select Gender') }}</option>
                                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('Male') }}</option>
                                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('Female') }}</option>
                                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>{{ __('Other') }}</option>
                                                </select>
                                                <span class="invalid-feedback" style="display: none;"></span>
                                                @error('gender')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="label-form" for="birthdate">{{ __('Birthdate') }}</label>
                                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}">
                                                <span class="invalid-feedback" style="display: none;"></span>
                                                @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sb btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                        <div class="form-group text-center mt-4">
                                            <p>Or sign up with:</p>
                                            <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">
                                                <i class="fa fa-facebook"></i> Sign up with Facebook
                                            </a>
                                            <a href="{{ route('login.google') }}" class="btn btn-danger btn-block">
                                                <i class="fa fa-google"></i> Sign up with Google
                                            </a>
                                        </div>
                                        <div class="form-group text-center">
                                            <a class="btn btn-link" href="{{ route('login') }}">
                                                {{ __('Sign In') }}
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form.contactForm');
            form.addEventListener('submit', function (event) {
                let isValid = true;

                // Validate First Name
                const firstName = document.getElementById('first-name');
                if (firstName.value.trim() === '') {
                    setError(firstName, 'First name is required');
                    isValid = false;
                } else {
                    clearError(firstName);
                }

                // Validate Last Name
                const lastName = document.getElementById('last-name');
                if (lastName.value.trim() === '') {
                    setError(lastName, 'Last name is required');
                    isValid = false;
                } else {
                    clearError(lastName);
                }

                // Validate Email
                const email = document.getElementById('email');
                const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if (email.value.trim() === '') {
                    setError(email, 'Email is required');
                    isValid = false;
                } else if (!email.value.match(emailPattern)) {
                    setError(email, 'Please enter a valid email address');
                    isValid = false;
                } else {
                    clearError(email);
                }

                // Validate Password
                const password = document.getElementById('password');
                if (password.value.trim() === '') {
                    setError(password, 'Password is required');
                    isValid = false;
                } else if (password.value.length < 6) {
                    setError(password, 'Password must be at least 6 characters long');
                    isValid = false;
                } else {
                    clearError(password);
                }

                // Validate Confirm Password
                const confirmPassword = document.getElementById('password-confirm');
                if (confirmPassword.value.trim() === '') {
                    setError(confirmPassword, 'Confirm Password is required');
                    isValid = false;
                } else if (confirmPassword.value !== password.value) {
                    setError(confirmPassword, 'Passwords do not match');
                    isValid = false;
                } else {
                    clearError(confirmPassword);
                }

                // Validate Gender
                const gender = document.getElementById('gender');
                if (gender.value === '') {
                    setError(gender, 'Gender is required');
                    isValid = false;
                } else {
                    clearError(gender);
                }

                // Validate Birthdate
                const birthdate = document.getElementById('birthdate');
                if (birthdate.value.trim() === '') {
                    setError(birthdate, 'Birthdate is required');
                    isValid = false;
                } else {
                    clearError(birthdate);
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });

            function setError(element, message) {
                const errorElement = element.nextElementSibling; // Lấy phần tử lỗi tiếp theo
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.style.display = 'block';
                }
                element.classList.add('is-invalid');
            }

            function clearError(element) {
                const errorElement = element.nextElementSibling; // Lấy phần tử lỗi tiếp theo
                if (errorElement) {
                    errorElement.textContent = '';
                    errorElement.style.display = 'none';
                }
                element.classList.remove('is-invalid');
            }
        });
    </script>
@endsection
