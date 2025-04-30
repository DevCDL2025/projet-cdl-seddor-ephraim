<?php

declare(strict_types=1);


namespace Domain\Shared\Enums;

use Support\Concerns\Enums\EnumEnhancements;

enum DaysOfWeekEnum: string
{
    use EnumEnhancements;

    case MONDAY    = "monday";
    case TUESDAY   = "tuesday";
    case WEDNESDAY = "wednesday";
    case THURSDAY  = "thursday";
    case FRIDAY    = "friday";
    case SATURDAY  = "saturday";
    case SUNDAY    = "sunday";


    public function locale(): string
    {
        return __('usuals.days-of-week.' . $this ->value);
    }

    public static function daysArray(): array
    {
        return collect(self::cases())->map(function ($item) {
            return [
                'value' => $item->value,
                'label' => $item->locale(),
            ];
        })->toArray();
    }
}
