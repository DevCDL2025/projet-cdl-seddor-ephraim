<?php

declare(strict_types=1);


namespace App\Main\Account\Controllers;

use Domain\Shared\Enums\GuardsEnum;
use Support\Controllers\UserProfileController;

class ProfileController extends UserProfileController
{

    /**
     * @inheritDoc
     */
    public function guard(): string
    {
        return GuardsEnum::ADMIN ->value;
    }

    /**
     * @inheritDoc
     */
    protected static function getShowProfileView(): ?string
    {
        return "Account/Profile/Details";
    }

    /**
     * @inheritDoc
     */
    protected static function getChangePasswordView(): ?string
    {
        return "Account/Profile/ChangePassword";
    }
}
