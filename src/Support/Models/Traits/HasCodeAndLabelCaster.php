<?php

declare(strict_types=1);


namespace Support\Models\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasCodeAndLabelCaster
{
    protected function code(): Attribute
    {
        return Attribute::make(
            set: static fn ($value) => strtoupper($value)
        );
    }

    protected function label(): Attribute
    {
        return Attribute::make(
            set: static fn ($value) => ucfirst($value)
        );
    }
}
