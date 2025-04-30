<?php

declare(strict_types=1);


namespace Support\Concerns\Data;

use Spatie\LaravelData\Lazy;

trait HasDateTransformer
{
    protected static function getTransformedLazyDate($date) : \Spatie\LaravelData\Support\Lazy\DefaultLazy
    {
        return Lazy::create(static fn () => ucwords(translate_and_format_date($date)))
            ->defaultIncluded();
    }
}
