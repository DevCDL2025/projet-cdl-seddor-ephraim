<?php

declare(strict_types=1);

use Carbon\Carbon;
use Domain\Permissions\Enums\RolesEnum;
use Domain\Shared\Enums\ConstantsEnum;
use Domain\Shared\Enums\GuardsEnum;
use Domain\Users\UsersManager;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Laravolt\Avatar\Facade as Avatar;
use Support\Flash\Flash;

if (!function_exists('filtered_array')) {
    function filtered_array(array $array): array {
        return array_filter($array, static fn($var) => ($var !== "" && !empty($var)));
    }
}

if (!function_exists('str_contains_any')) {
    function str_contains_any(string $haystack, array $needles): bool {
        foreach ($needles as $needle) {
            if (str_contains($haystack, $needle)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('hide_string')) {
    function hide_string(string $str_to_process, string $symbol = "*", $offset = -4): string {
        return str_pad(substr($str_to_process, $offset), strlen($str_to_process), $symbol, STR_PAD_LEFT);
    }
}

if (! function_exists('flash')) {
    function flash(): Flash {
        return app(Flash::class);
    }
}

if (!function_exists('flash_info')) {
    function flash_info(string $message): void {
        flash() ->info($message);
    }
}

if (!function_exists('flash_success')) {
    function flash_success(string $message): void {
        flash() ->success($message);
    }
}

if (!function_exists('flash_warning')) {
    function flash_warning(string $message): void {
        flash() ->warning($message);
    }
}

if (!function_exists('flash_error')) {
    function flash_error(string $message): void {
        flash() ->error($message);
    }
}

if (!function_exists('notiflash')) {
    function notiflash(string $level, string $message): void {
        flash() ->{$level}($message);
    }
}

if (!function_exists('translate_and_format_date')) {
    function translate_and_format_date($date): string {
        $date = Carbon::parse($date);
        $locale = app()->getLocale();

        Carbon::setlocale($locale);
        $format = $locale === 'fr' ? 'D j M, Y H:i:s' : 'D, M j, Y g:i:s';

        return $date->translatedFormat($format);
    }
}

if (!function_exists('format_date_for_sql')) {
    function format_date_for_sql($date): string {
        return Carbon::parse($date) ->translatedFormat('Y-m-d');
    }
}

if (!function_exists('format_date_and_time_for_sql')) {
    function format_date_and_time_for_sql($date): string {
        return Carbon::parse($date) ->translatedFormat('Y-m-d H:i:s');
    }
}

if (!function_exists('translate_and_format_number')) {
    function translate_and_format_number($number, $decimals = 2): string {
        $locale = app()->getLocale();

        return ($locale === "fr")
            ? number_format($number, $decimals, ',', ' ')
            : number_format($number, $decimals, '.', ',');
    }
}

if (!function_exists('generate_avatar_from')) {
    function generate_avatar_from(string $str): string {
        return Avatar::create($str) ->toBase64();
    }
}

if (!function_exists('app_route')) {
    function app_route(string $route, array $parameters = []): string {
        return route(ConstantsEnum::APP_ROUTE_NAME_PREFIX ->description() . $route, $parameters);
    }
}

if (!function_exists('to_app_route')) {
    function to_app_route(string $route, array $parameters = []): \Illuminate\Http\RedirectResponse
    {
        return to_route(ConstantsEnum::APP_ROUTE_NAME_PREFIX ->description() . $route, $parameters);
    }
}

if (! function_exists('get_auth_guard')) {
    function get_auth_guard(): ?string {
        return UsersManager::getAuthGuard();
    }
}

if (! function_exists('get_auth_user')) {
    function get_auth_user(string $guard = GuardsEnum::ADMIN ->value): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth($guard)->user();
    }
}

if (! function_exists('auth_user_has_any_roles')) {
    function auth_user_has_any_roles(string $guard = GuardsEnum::ADMIN ->value): bool
    {
        $authUser = get_auth_user($guard);

        return method_exists($authUser, 'roles') && $authUser->roles !== null;
    }
}

if (!function_exists('get_auth_user_role_name')) {
    function get_auth_user_role_name(string $guard = GuardsEnum::ADMIN ->value) {
        return UsersManager::getAutUserFirstRole($guard) -> name;
    }
}

if (!function_exists('auth_user_role_is')) {
    function auth_user_role_is(RolesEnum $rolesEnum, $guard = GuardsEnum::ADMIN ->value): bool
    {
        return get_auth_user_role_name($guard) === $rolesEnum->value;
    }
}

if (!function_exists('check_if_is_allowed_to')) {
    function check_if_is_allowed_to($permission, $guard = GuardsEnum::ADMIN ->value) {
        return get_auth_user($guard) ->can($permission);
    }
}

if (!function_exists('abort_if_not_allowed_to')) {
    function abort_if_not_allowed_to($permission, $guard = GuardsEnum::ADMIN ->value): void {
        $permission = ($permission instanceof \Domain\Permissions\Enums\PermissionsEnum) ? $permission ->value : $permission;

        abort_if(
            !check_if_is_allowed_to($permission, $guard),
            Response::HTTP_FORBIDDEN,
            __('messages.your_are_not_allowed_to_perform_this_action')
        );
    }
}

if (!function_exists('get_default_currency')) {
    function get_default_currency() {
        return \Domain\ExchangeRates\Services\ExchangeRateService::getDefaultCurrency();
    }
}

if (!function_exists('get_default_currency_exchange_rates')) {
    function get_default_currency_exchange_rates(): array
    {
        return \Domain\ExchangeRates\Services\DefaultCurrencyExchangeRatesRegistrar::getCachedDefaultCurrencyExchangeRates() ->toArray();
    }
}

if (!function_exists('append_currency_symbol')) {
    function append_currency_symbol($number, $symbol): string
    {
        return $number . " " . $symbol;
    }
}

if (!function_exists('translate_format_and_append_currency_symbol_to_number')) {
    function translate_format_and_append_currency_symbol_to_number($number, $symbol, $decimals = 2): string
    {
        return translate_and_format_number($number, $decimals) . " " . $symbol;
    }
}


if (!function_exists('get_data_with_attributes_from')) {
    function get_data_with_attributes_from(string $model, $attributes = ['*']): Collection
    {
        return app($model) ->query() ->select($attributes) ->get();
    }
}
