<?php

declare(strict_types=1);


namespace Domain\Users\Actions;

use Domain\Users\Data\UserData;
use Domain\Users\Models\User;
use Domain\Users\UsersManager;

class CreateNewUser extends UsersManager
{
    public static function execute(UserData $data) : User
    {
        $user = self::saveUser($data);

        SendVerificationEmail::execute($user);

        return $user;
    }
}
