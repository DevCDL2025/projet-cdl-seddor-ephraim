<?php

declare(strict_types=1);


namespace Domain\Permissions\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum RolesEnum: string implements EnumsDefinition
{
    use EnumEnhancements;

    case SUPER_ADMIN = 'super-admin';
    case ADMIN       = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => "super administrateur",
            self::ADMIN       => "administrateur",
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => "Peut tout faire.",
            self::ADMIN       => "Gère l'espace d'administration ou encore le back-office.",
        };
    }
}
