<?php

declare(strict_types=1);


namespace Domain\Shared\Enums;

use Support\Concerns\Enums\EnumEnhancements;

enum TransactionTypesEnum: string
{
    use EnumEnhancements;

    case TRANSFER         = "transfer";
    case SHIPPING_PROGRAM = "shipping-program";
    case SHIPPING         = "shipping";
    case PACKAGE          = "package";

    public function serialSerie()
    {
        return match ($this) {
            self::TRANSFER         => "TNF",
            self::SHIPPING_PROGRAM => "SPRG",
            self::SHIPPING         => "SPG",
            self::PACKAGE          => "PKG",
        };
    }

    /**
     * Returns enum values as an array.
     */
    public static function serialSeriesArray(): array
    {
        foreach (self::cases() as $enum) {
            $series[] = $enum->serialSerie();
        }

        return $series;
    }
}
