<?php

declare(strict_types=1);


namespace Domain\Users\Enums;

use Domain\Permissions\Enums\RolesEnum;

enum UsersEnum
{
    case SUPER_ADMIN_USER;
    case ADMIN_USER;

    public function description(): array
    {
        return match ($this) {
            self::SUPER_ADMIN_USER => [
                'last_name'  => 'Root',
                'first_name' => 'Admin',
                'email'      => 'super-admin@test.com',
                'username'   => 'sup-admin'
            ],

            self::ADMIN_USER       => [
                'last_name'  => 'Test',
                'first_name' => 'Admin',
                'email'      => 'admin@test.com',
                'username'   => 'admin'
            ],
        };
    }

    public function role() : string
    {
        return match ($this) {
            self::SUPER_ADMIN_USER => RolesEnum::SUPER_ADMIN->value,
            self::ADMIN_USER       => RolesEnum::ADMIN->value,
        };
    }

    public static function loginLinks() : array
    {
        return collect(self::cases())->map(function ($item) {
            return [
                "email" => $item->description()['email'],
                "role"  => $item->role()
            ];
        })->toArray();
    }
}
