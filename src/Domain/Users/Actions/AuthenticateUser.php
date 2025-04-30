<?php

declare(strict_types=1);


namespace Domain\Users\Actions;

use Domain\Shared\Enums\GuardsEnum;
use Domain\Users\Data\AuthenticationData;
use Domain\Users\UsersManager;
use Illuminate\Validation\ValidationException;

class AuthenticateUser extends UsersManager
{
    /**
     * @throws ValidationException
     */
    public static function execute(AuthenticationData $data, string $guard = GuardsEnum::ADMIN ->value): void
    {
        $user = self::checkCredentials($data);

        if ($guard === 'admin') {
            auth() ->guard($guard)->login($user ->admin);
        }

        else {
            auth() ->guard($guard)->login($user);
        }

        self::saveLoginTime($user);
    }
}
