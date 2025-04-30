<?php

declare(strict_types=1);


namespace Support\Controllers\Traits;

use Domain\Shared\Enums\ResourcesActions;

trait HasAuthorizationManager
{
    protected static function checkIfIsAllowedToView(): void
    {
        abort_if_not_allowed_to(ResourcesActions::VIEW ->value . ' ' . self::$resourcesEnum ->plural());
    }

    protected static function checkIfIsAllowedToCreate(): void
    {
        abort_if_not_allowed_to(ResourcesActions::CREATE ->value . ' ' . self::$resourcesEnum ->plural());
    }

    protected static function checkIfIsAllowedToUpdate(): void
    {
        abort_if_not_allowed_to(ResourcesActions::EDIT ->value . ' ' . self::$resourcesEnum ->plural());
    }

    protected static function checkIfIsAllowedToDelete(): void
    {
        abort_if_not_allowed_to(ResourcesActions::DELETE ->value . ' ' . self::$resourcesEnum ->plural());
    }

    protected static function checkIfIsAllowedToRestore(): void
    {
        abort_if_not_allowed_to(ResourcesActions::RESTORE ->value . ' ' . self::$resourcesEnum ->plural());
    }

    protected static function checkIfIsAllowedToForceDelete(): void
    {
        abort_if_not_allowed_to(ResourcesActions::FORCE_DELETE ->value . ' ' . self::$resourcesEnum ->plural());
    }
}
