<?php

declare(strict_types=1);


namespace Domain\Shared\Enums;

use Illuminate\Support\Str;
use Support\Concerns\Enums\EnumEnhancements;

enum MonthsEnum: int
{
    use EnumEnhancements;

    case JANVIER   = 1;
    case FEVRIER   = 2;
    case MARS      = 3;
    case AVRIL     = 4;
    case MAI       = 5;
    case JUIN      = 6;
    case JUILLET   = 7;
    case AOUT      = 8;
    case SEPTEMBRE = 9;
    case OCTOBRE   = 10;
    case NOVEMBRE  = 11;
    case DECEMBRE  = 12;
}
