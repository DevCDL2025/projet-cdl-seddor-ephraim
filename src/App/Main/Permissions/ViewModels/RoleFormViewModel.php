<?php

declare(strict_types=1);


namespace App\Main\Permissions\ViewModels;

use App\Main\Permissions\Queries\PermissionIndexQuery;
use App\Main\Permissions\Resources\PermissionsForRoleFormResource;
use Domain\Permissions\Data\RoleData;
use Domain\Permissions\Models\Role;
use Spatie\ViewModels\ViewModel;
use Support\Concerns\StaticallyInstanciable;

class RoleFormViewModel extends ViewModel
{
    use StaticallyInstanciable;

    public function __construct(
        public PermissionIndexQuery $query,
        public ?Role $role = null,
    )
    {}

    public function formSchema(): array|RoleData
    {
        return $this ->role !== null
            ? RoleData::forForm($this->role)
            : RoleData::empty(['id' => '']);
    }

    public function permissions(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return PermissionsForRoleFormResource::collection($this ->query ->paginate(28) ->appends(request()->query()));
    }

    public function toArray(): array
    {
        return [
            "formSchema" => $this ->formSchema(),
            "permissions" => $this ->permissions(),
        ];
    }
}
