<?php

declare(strict_types=1);


namespace Support\Contracts;

interface EnumsDefinition
{
    public function label(): string;

    public function description(): string;
}
