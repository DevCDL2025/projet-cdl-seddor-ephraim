<?php

declare(strict_types=1);


namespace Support\Concerns;

trait StaticallyInstanciable
{
    public static function make(...$parameters) : self
    {
        return new self(...$parameters);
    }
}
