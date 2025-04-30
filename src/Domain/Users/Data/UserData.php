<?php

declare(strict_types=1);


namespace Domain\Users\Data;

use Support\Concerns\Rules\EmailValidationRules;
use Support\Concerns\Rules\PasswordValidationRules;
use Support\Concerns\Rules\PhoneNumberValidationRules;

class UserData extends SharedUserData
{
    use EmailValidationRules,
        PhoneNumberValidationRules,
        PasswordValidationRules;

    public static function rules(): array
    {
        return [
            'id'           => ['nullable'],
            'last_name'    => ['nullable', 'string', 'max:255'],
            'first_name'   => ['required', 'string', 'max:255'],
            'email'        => self::uniqueEmailRules(),
            'phone_number' => self::phoneNumberRules(),
            'password'     => self::passwordRules(),
        ];
    }
}
