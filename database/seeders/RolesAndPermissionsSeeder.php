<?php

namespace Database\Seeders;

use Domain\Permissions\Enums\PermissionsEnum;
use Domain\Permissions\Enums\RolesEnum;
use Domain\Permissions\Models\Permission;
use Domain\Permissions\Models\Role;
use Domain\Shared\Enums\GuardsEnum;
use Domain\Shared\Enums\ResourcesActions;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission seeds
        $actions     = ResourcesActions::cases();
        $resources   = ResourcesEnum::cases();
        $permissions = PermissionsEnum::toArray();

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        app() ->setLocale("fr");

        echo "\e[32mSeeding:\e[0m Permissions \r\n";

        // create permissions
        foreach ($actions as $action) {
            foreach ($resources as $resource) {
                Permission::create([
                    'guard_name'    => GuardsEnum::ADMIN ->value,
                    'name'          => $action ->value . ' ' . $resource->plural(),
                    'label'         => ucwords($action ->label() . ' ' . $resource->locale(2)),
                    'description'   => $action ->description() . ' ' . $resource ->locale(2).".",
                ]);
            }
        }

        foreach ($permissions as $permission) {
            Permission::create([
                'guard_name'    => GuardsEnum::ADMIN ->value,
                'name'          => $permission['value'],
                'label'         => ucwords($permission['label']),
                'description'   => $permission['description'],
            ]);
        }

        // create roles and assign created permissions

        echo "\e[32mSeeding:\e[0m Roles \r\n";

        $roles = RolesEnum::cases();

        foreach ($roles as $role) {
            $createdRole = Role::create([
                'guard_name'    => GuardsEnum::ADMIN ->value,
                'name'          => $role ->value,
                'label'         => ucwords($role ->label()),
                'description'   => ucfirst($role ->description()),
            ]);

            if ($role === RolesEnum::SUPER_ADMIN) {
                $createdRole ->givePermissionTo(Permission::all());
            }

            if ($role === RolesEnum::ADMIN) {
                $permissions = Permission::search("name", [
                    ResourcesEnum::USER ->plural(),
                ]) ->get();

                $createdRole ->givePermissionTo($permissions);
            }
        }
    }
}
