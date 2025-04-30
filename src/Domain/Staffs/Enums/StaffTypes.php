<?php

declare(strict_types=1);


namespace Domain\Staffs\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum StaffTypes: string implements EnumsDefinition
{
    use EnumEnhancements;

    case DOCTOR = "doctor";
    case NURSE = "nurse";
    case WORKER = "worker";

    public function label(): string
    {
        return match ($this) {
            self::DOCTOR => __('displays.staff.type.doctor'),
            self::NURSE  => __('displays.staff.type.nurse'),
            self::WORKER => __('displays.staff.type.worker'),
        };
    }

    public function description(): string
    {
        return $this ->label();
    }
}
