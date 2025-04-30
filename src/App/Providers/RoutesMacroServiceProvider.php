<?php

declare(strict_types=1);


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Support\Concerns\Routes\HasAppRoutes;
use Support\Concerns\Routes\HasAuthAdminRoutes;
use Support\Concerns\Routes\HasLocalizedRoutes;

class RoutesMacroServiceProvider extends ServiceProvider
{
    use HasLocalizedRoutes,
        HasAuthAdminRoutes,
        HasAppRoutes;

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this ->mapLocalizedRoutes();
        $this ->mapAuthAdminRoutes();
        $this ->mapAppRoutes();
        $this ->mapLocalizedAppRoutes();
    }
}
