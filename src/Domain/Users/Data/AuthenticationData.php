<?php

declare(strict_types=1);


namespace Domain\Users\Data;

use Spatie\LaravelData\Data;
use Support\Concerns\Rules\EmailValidationRules;

class AuthenticationData extends Data
{
    use EmailValidationRules;

    public function __construct(
        public string $email,
        public string $password
    )
    {}

    public static function rules(): array
    {
        return [
            'email'    => self::emailRules(),
            'password' => ['required']
        ];
    }
}
