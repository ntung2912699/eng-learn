<?php

namespace App\Providers;

use App\Http\Middleware\CheckAdminRole;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Đăng ký middleware cho route
        Route::middleware('check.admin.role', CheckAdminRole::class);

        Route::middleware('web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/web.php'));

        Route::middleware('api')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/api.php'));

        // Thêm route tùy chỉnh ở đây
        Route::middleware(['web', 'check.admin.role'])
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/admin.php'));
    }
}
