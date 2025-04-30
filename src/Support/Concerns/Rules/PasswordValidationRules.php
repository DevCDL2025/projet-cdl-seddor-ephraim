<?php

declare(strict_types=1);


namespace Support\Concerns\Rules;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, Rule|array<mixed>|string>
     */
    protected static function passwordRules(): array
    {
        return ['required', 'confirmed', Password::min(6)];
    }
}
