<?php

declare(strict_types=1);


namespace Support\Concerns\Rules;

trait ContentValidationRules
{
    protected static function requiredContentRules(): array
    {
        return [
            'required',
            'string',
            'min:5'
        ];
    }

    protected static function nullableContentRules(): array
    {
        return [
            'nullable',
            'string',
            'min:5'
        ];
    }
}
