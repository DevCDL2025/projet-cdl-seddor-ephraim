<?php

declare(strict_types=1);


namespace Support\Concerns\Rules;

use Domain\Users\Models\User;
use Illuminate\Validation\Rule;

trait EmailValidationRules
{
    protected static function emailRules(): array
    {
        return [
            'required',
            'string',
            'email',
            'max:255'
        ];
    }

    protected static function nullableEmailRules(): array
    {
        return [
            'nullable',
            'string',
            'email',
            'max:255'
        ];
    }

    protected static function uniqueEmailRules() : array
    {
        return array_merge(self::emailRules(), [
            Rule::unique(User::class),
        ]);
    }

    protected static function uniqueEmailRulesExcept($id, $column = "id") : array
    {
        return array_merge(self::emailRules(), [
            Rule::unique(User::class) ->ignore($id, $column),
        ]);
    }
}
