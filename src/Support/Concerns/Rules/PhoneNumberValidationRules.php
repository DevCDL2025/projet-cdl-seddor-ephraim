<?php

declare(strict_types=1);


namespace Support\Concerns\Rules;

trait PhoneNumberValidationRules
{
    protected static function phoneNumberRules(): array
    {
        return ['required'];
    }
}
