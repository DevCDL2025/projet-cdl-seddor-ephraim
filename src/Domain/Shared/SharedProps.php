<?php

declare(strict_types=1);


namespace Domain\Shared;

use Domain\Shared\Enums\GuardsEnum;
use Domain\Users\UsersManager;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SharedProps
{
    public static function appData(): array
    {
        return [
            'name'          => config('app.name', 'Rapide Course'),
        ];
    }

    public static function localesData(): array
    {
        $locales = [];

        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $locales[$localeCode] = [
                'code'  => $localeCode,
                'name'  => __('usuals.locales.'.$localeCode),
                'url'   => LaravelLocalization::getLocalizedURL($localeCode, null, [], true)
            ];
        }

        return [
            'current'   => [
                'code'  => LaravelLocalization::getCurrentLocale(),
                'name'  => __('usuals.locales.'.LaravelLocalization::getCurrentLocale()),
            ],
            'supported' => $locales,
        ];
    }

    public static function flashData(): ?array
    {
        return flash() -> getMessage() ?-> toArray();
    }

    public static function toArray(GuardsEnum $guardsEnum = GuardsEnum::ADMIN): array
    {
        return [
            'environment'   => app()->environment(),
            'app'           => self::appData(),
            'locales'       => self::localesData(),
            'flash'         => self::flashData(),
            'auth'          => UsersManager::getSharedUserData($guardsEnum ->value)
        ];
    }
}
