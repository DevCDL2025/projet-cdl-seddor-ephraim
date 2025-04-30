<?php

declare(strict_types=1);


namespace Domain\Users\Actions;

use Domain\Shared\Enums\ConstantsEnum;
use Domain\Users\Models\User;

class SendVerificationEmail
{
    public static function execute(User $user) : void
    {
        if (ConstantsEnum::VERIFY_EMAIL ->description()) {
            $user ->sendEmailVerificationNotification();
        }

        $user ->markEmailAsVerified();
    }
}
