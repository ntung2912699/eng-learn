<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminRole;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chat-form', [\App\Http\Controllers\AiServices\AIController::class, 'chatForm'])->name('chat-form');
Route::post('/chat', [\App\Http\Controllers\AiServices\AIController::class, 'generateResponse'])->name('chat');

// Routes cho đăng nhập bằng Facebook
Route::get('login/facebook', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

Route::get('login/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::post('/verify-otp', [\App\Http\Controllers\Auth\RegisterController::class, 'verifyOtp'])->name('verify-otp');
Route::get('/verify-otp', [\App\Http\Controllers\Auth\RegisterController::class, 'showOtpForm'])->name('verifyOtp');
Route::post('/register-verify-otp', [\App\Http\Controllers\Auth\RegisterController::class, 'registerVerifyOtp'])->name('registerVerifyOtp');
Route::get('/resend-otp', [\App\Http\Controllers\Auth\RegisterController::class, 'resendOtp'])->name('resend-otp');
