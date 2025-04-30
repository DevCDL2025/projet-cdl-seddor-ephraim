<?php

declare(strict_types=1);


namespace Domain\Shared\Enums;

use Support\Concerns\Enums\EnumEnhancements;

enum GuardsEnum: string
{
    use EnumEnhancements;

    case ADMIN = 'admin';
}
