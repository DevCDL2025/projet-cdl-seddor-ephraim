<?php

declare(strict_types=1);


namespace Support\Concerns\Routes;

use Domain\Shared\Enums\ConstantsEnum;
use Illuminate\Support\Facades\Route;

trait HasAppRoutes
{
    /**
     * Define the "app" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapAppRoutes(): void
    {
        Route::macro('forApp', function ($group) {
            Route::group([
                'middleware'    => ['app'],
                'as'            => ConstantsEnum::APP_ROUTE_NAME_PREFIX ->description(),
            ], $group);
        });
    }

    /**
     * Define the "localized app" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapLocalizedAppRoutes(): void
    {
        Route::macro('forLocalizedApp', function ($group) {
            Route::localized(function () use ($group) {
                Route::forApp($group);
            });
        });
    }
}
