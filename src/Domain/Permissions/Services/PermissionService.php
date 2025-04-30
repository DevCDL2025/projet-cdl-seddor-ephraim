<?php

declare(strict_types=1);


namespace Domain\Permissions\Services;

use Domain\Permissions\Enums\RolesEnum;
use Domain\Permissions\Models\Permission;
use Domain\Permissions\Models\Role;
use Illuminate\Support\Collection;

class PermissionService
{
    public static function getRolesWithAttributes($attributes = ['id', 'label']): Collection
    {
        $query = Role::query() ->select($attributes);

        if (auth_user_role_is(RolesEnum::ADMIN)) {
            $query->whereNotIn('name', [RolesEnum::SUPER_ADMIN]);
        }

        return $query->get();
    }

    public static function getPermissionsLabelsAndIds(): Collection
    {
        return Permission::select(['id', 'label']) ->get();
    }
}
