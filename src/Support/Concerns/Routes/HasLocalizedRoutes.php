<?php

declare(strict_types=1);


namespace Support\Concerns\Routes;

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait HasLocalizedRoutes
{
    /**
     * Define the "localized" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapLocalizedRoutes(): void
    {
        Route::macro('localized', function ($group) {
            Route::group([
                'prefix'        => LaravelLocalization::setLocale(),
                'middleware'    => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
            ], $group);
        });
    }
}
