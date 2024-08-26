<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminRole;

Auth::routes();

Route::middleware([CheckAdminRole::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    // Các route khác cho admin
});
