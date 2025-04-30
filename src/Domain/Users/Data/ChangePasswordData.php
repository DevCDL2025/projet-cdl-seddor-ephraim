<?php

declare(strict_types=1);


namespace Domain\Users\Data;

use Spatie\LaravelData\Data;
use Support\Concerns\Rules\PasswordValidationRules;

class ChangePasswordData extends Data
{
    use PasswordValidationRules;

    public function __construct(
        public string  $new_password,
        public ?string $current_password = null,
    )
    {}

    public static function rules(): array
    {
        return [
            'current_password' => ['required', 'string'],
            'new_password'     => self::passwordRules(),
        ];
    }
}
