<?php

declare(strict_types=1);


namespace Domain\Shared\Enums;

use function Laravel\Prompts\select;

enum ConstantsEnum
{
    case DEFAULT_PASSWORD;
    case APP_ROUTE_NAME_PREFIX;
    case NUMBER_OF_LAST_AUDIT_LINE_TO_TAKE;
    case PAGINATE_PER_PAGE;
    case VERIFY_EMAIL;
    case MEDIA_STORAGE_PATH;
    case IMAGES_URL;


    public function description() : string|int
    {
        return match ($this) {
            self::DEFAULT_PASSWORD                  => "password",
            self::APP_ROUTE_NAME_PREFIX             => "app.",
            self::NUMBER_OF_LAST_AUDIT_LINE_TO_TAKE => 10,
            self::PAGINATE_PER_PAGE                 => 15,
            self::VERIFY_EMAIL                      => env("APP_VERIFY_EMAIL", false),
            self::MEDIA_STORAGE_PATH                => storage_path('app/public/media'),
            self::IMAGES_URL                        => "https://picsum.photos/700/400",
        };
    }
}
