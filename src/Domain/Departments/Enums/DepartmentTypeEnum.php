<?php

declare(strict_types=1);


namespace Domain\Departments\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum DepartmentTypeEnum: string implements EnumsDefinition
{
    use EnumEnhancements;

    case POLE = 'pole';
    case SPECIFIC_UNITY = 'specific-unity';
    case GENERAL_SERVICE = 'general-service';

    public function label(): string
    {
        return match ($this) {
            self::GENERAL_SERVICE => "Services Généraux",
            self::POLE            => "Pôles",
            self::SPECIFIC_UNITY  => "Unité spécifique"
        };
    }

    public function description(): string
    {
        return $this ->label();
    }
}
