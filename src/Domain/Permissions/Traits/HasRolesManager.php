<?php

declare(strict_types=1);


namespace Domain\Permissions\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Spatie\Permission\Traits\HasRoles;

trait HasRolesManager
{
    use HasRoles;

    public function firstRole()
    {
        return $this ->roles() -> first();
    }

    public function getFirstRole(): Attribute
    {
        $role = $this -> firstRole();

        return Attribute::make(
            get: static fn () => filtered_array([
                "name"          => $role -> name,
                "label"         => $role -> label,
                "description"   => $role -> description,
            ]),
        );
    }

    public function getRolesNames(): \Illuminate\Support\Collection
    {
        return $this ->roles() ->pluck('name');
    }

    public function getPermissionsNamesViaRoles(): array
    {
        return $this ->getPermissionsViaRoles() ->pluck('name')->toArray();
    }
}
