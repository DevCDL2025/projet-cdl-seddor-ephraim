<?php

declare(strict_types=1);


namespace Support\Concerns\Routes;

use Illuminate\Support\Facades\Route;

trait HasAuthAdminRoutes
{
    /**
     * Define the "authenticated admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapAuthAdminRoutes(): void
    {
        Route::macro('forAuthenticatedAdmin', function ($group) {
            Route::group([
                'middleware'    => ['admin'],
            ], $group);
        });
    }
}
