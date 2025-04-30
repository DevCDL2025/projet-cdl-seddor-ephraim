<?php

declare(strict_types=1);


namespace Domain\Users\Traits;

use Domain\Shared\Enums\GuardsEnum;
use Domain\Users\Data\SharedUserData;
use Domain\Users\Data\UpdateUserProfileData;
use Domain\Users\Models\User;

trait HasAuthUserManager
{
    /**
     * Get authenticated guard.
     *
     * @return string|null
     */
    public static function getAuthGuard(): ?string
    {
        $guards = GuardsEnum::valueArray();

        foreach ($guards as $guard) {
            if (auth()->guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }

    /**
     * Get authenticated user model.
     *
     * @param string $guard
     * @return User|null
     */
    public static function getAuthUserModel(string $guard = GuardsEnum::ADMIN ->value): User|null
    {
        $authUser = auth($guard) ->user();

        if ($authUser) {
            return method_exists($authUser, 'account') ? $authUser ->account : $authUser;
        }

        return null;
    }

    public static function getSharedUserData(string $guard = GuardsEnum::ADMIN ->value): ?array
    {
        $userData = [];

        $authUser = get_auth_user($guard);

        if (!$authUser) {
            return null;
        }

        $userModel = method_exists($authUser, 'account') ? $authUser->account : $authUser;

        $userData['avatar']    = generate_avatar_from($userModel->full_name);
        $userData['full_name'] = $userModel->full_name;
        $userData['email']     = $userModel->email;

        $role = self::getAutUserFirstRole($guard);

        $userData['roles']          = [
            "name"  => $role->name,
            "label" => $role->label,
        ];

        $userData['permissions']    = $authUser ->getPermissionsNamesViaRoles();

        return [$guard => $userData];
    }

    public static function getAutUserFirstRole(string $guard = GuardsEnum::ADMIN ->value)
    {
        return get_auth_user($guard) ?->firstRole();
    }

    public static function getAuthUserAgency(string $guard = GuardsEnum::ADMIN ->value)
    {
        return auth($guard) ->user() ?->agency;
    }

    public static function getAuthUserProfile(string $guard = GuardsEnum::ADMIN ->value): SharedUserData
    {
        $user = self::getAuthUserModel($guard);

        return UpdateUserProfileData::from([
            "id"                => $user ->_id,
            "last_name"         => $user ->last_name,
            "first_name"        => $user ->first_name,
            "email"             => $user ->email,
            "phone_number"      => $user ->phone_number,
            "username"          => $user ->username,
        ]);
    }
}
