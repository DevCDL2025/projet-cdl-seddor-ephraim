<?php

declare(strict_types=1);


namespace Support\Middleware;

use Closure;
use Domain\Shared\Enums\GuardsEnum;
use Domain\Users\Models\Admin;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth(GuardsEnum::ADMIN ->value) && auth(GuardsEnum::ADMIN ->value) ->user() !== null) {
            if (auth('admin') ->user() instanceof Admin) {
                return $next($request);
            }

            flash_info(__('messages.do_not_have_admin_rights'));

            return to_app_route('auth.login');
        }

        else {
            flash_info(__('messages.must_be_connected_to_continue'));

            return to_app_route('auth.login');
        }
    }
}
