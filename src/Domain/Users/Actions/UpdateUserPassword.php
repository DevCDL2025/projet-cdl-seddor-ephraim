<?php

declare(strict_types=1);


namespace Domain\Users\Actions;

use Domain\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserPassword
{
    public static function execute(User $user, string $password): User
    {
        $user->forceFill([
            'password' => Hash::make($password)
        ]) -> save();

        return $user;
    }
}
