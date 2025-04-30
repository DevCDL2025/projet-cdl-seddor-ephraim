<?php

declare(strict_types=1);


namespace Domain\Permissions\Actions;

use Domain\Permissions\Data\RoleData;
use Domain\Permissions\Models\Role;
use Domain\Shared\Enums\GuardsEnum;

class SaveRole
{
    public static function execute(RoleData $data, Role $role = null): void
    {
        $role = $role ?? new Role();

        $role ->fill([
            "name"          => $data->name,
            "label"         => $data->label,
            "description"   => $data->description,
        ]);

        $role ->guard_name = GuardsEnum::ADMIN ->value;

        $role ->save();

        $role ->syncPermissions($data ->permissions);
    }
}
