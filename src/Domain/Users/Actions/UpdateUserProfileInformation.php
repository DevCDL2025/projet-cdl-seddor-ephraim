<?php

declare(strict_types=1);


namespace Domain\Users\Actions;

use Domain\Users\Data\UpdateUserProfileData;
use Domain\Users\Models\User;
use Domain\Users\UsersManager;

class UpdateUserProfileInformation extends UsersManager
{
    public static function execute(UpdateUserProfileData $data, User $user): User
    {
        if ($user ->email !== $data ->email && !$user ->has("admin")) {
            self::saveUser($data, $user, false, true);
            SendVerificationEmail::execute($user);
        }

        self::saveUser($data, $user, false);

        return $user;
    }
}
