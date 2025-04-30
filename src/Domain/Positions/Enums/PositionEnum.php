<?php

declare(strict_types=1);


namespace Domain\Positions\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum PositionEnum: string implements EnumsDefinition
{
    use EnumEnhancements;

    case ANIMATEUR   = "animateur";
    case SECRETARIAT = "secretariat";

    public function label(): string
    {
        return match ($this) {
            self::ANIMATEUR   => "Animateur Infirmier",
            self::SECRETARIAT => "Secrétariat Médical",
        };
    }

    public function description(): string
    {
        return $this->label();
    }
}
