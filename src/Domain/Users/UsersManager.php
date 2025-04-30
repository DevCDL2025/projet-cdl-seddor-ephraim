<?php

declare(strict_types=1);


namespace Domain\Users;

use Domain\Shared\Enums\ConstantsEnum;
use Domain\Users\Data\AuthenticationData;
use Domain\Users\Data\SharedUserData;
use Domain\Users\Models\User;
use Domain\Users\Traits\HasAuthUserManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsersManager
{
    use HasAuthUserManager;

    /**
     * Save user information's
     *
     * @param SharedUserData $data
     * @param User|null $user
     * @param bool $isCreating
     * @param bool $newEmail
     *
     * @return User
     */
    public static function saveUser(SharedUserData $data, User $user = null, bool $isCreating = true, bool $newEmail = false) : User
    {
        $user = $user ?? new User();

        $user ->fill([
            "last_name"     => $data->last_name,
            "first_name"    => $data->first_name,
            "email"         => $data->email,
            "phone_number"  => $data->phone_number,
        ]);

        if   ($newEmail) {
            $user ->email_verified_at = null;
        }

        if ($isCreating) {
            $user ->password = Hash::make($data->password ?? ConstantsEnum::DEFAULT_PASSWORD ->description());
        }

        $user ->save();

        return $user;
    }

    /**
     * Get user by email
     *
     * @param string $email
     * @return User|null
     */
    public static function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email) -> first();
    }

    /**
     * Validate / Check email
     *
     * @param string $email
     * @return User
     * @throws ValidationException
     */
    protected static function checkEmail(string $email): User
    {
        $user = self::findUserByEmail($email);

        if (is_null($user)) {
            throw ValidationException::withMessages([
                'email' => __('messages.provided_credentials_do_not_match_records')
            ]);
        }

        return $user;
    }

    /**
     * Check user's credentials
     *
     * @param AuthenticationData $data
     * @return User
     * @throws ValidationException
     */
    protected static function checkCredentials(AuthenticationData $data): User
    {
        $user = self::checkEmail($data->email);

        if (!Hash::check($data ->password, $user ->password)) {
            throw ValidationException::withMessages([
                'email' => __('messages.provided_credentials_do_not_match_records')
            ]);
        }

        return $user;
    }

    /**
     * Update user's last login time
     *
     * @param User $user
     *
     * @return void
     */
    protected static function saveLoginTime(User $user): void
    {
        $user ->last_login_at = now();
        $user ->save();
    }
}
