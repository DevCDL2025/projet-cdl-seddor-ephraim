<?php

declare(strict_types=1);


namespace Domain\Permissions\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum PermissionsEnum: string implements EnumsDefinition
{
    use EnumEnhancements;


    public function label(): string
    {
        return "";
        /*return match ($this) {

        };*/
    }

    public function description(): string
    {
        return "";
        /*return match ($this) {

        };*/
    }
}
