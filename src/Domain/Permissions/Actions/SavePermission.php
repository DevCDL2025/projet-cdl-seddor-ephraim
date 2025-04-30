<?php

declare(strict_types=1);


namespace Domain\Permissions\Actions;

use Domain\Permissions\Data\PermissionData;
use Domain\Permissions\Models\Permission;
use Domain\Shared\Enums\GuardsEnum;

class SavePermission
{
    public static function execute(PermissionData $data, Permission $permission = null): void
    {
        $permission = $permission ?? new Permission();

        $permission ->fill([
            "name"          => $data->name,
            "label"         => $data->label,
            "description"   => $data->description,
        ]);

        $permission ->guard_name = GuardsEnum::ADMIN ->value;

        $permission->save();
    }
}
