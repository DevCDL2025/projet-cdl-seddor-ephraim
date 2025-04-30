<?php

declare(strict_types=1);


namespace Domain\Users\Actions;

use Domain\Permissions\Enums\RolesEnum;
use Domain\Permissions\Models\Role;
use Domain\Shared\Enums\GuardsEnum;
use Domain\Users\Data\AdminData;
use Domain\Users\Models\Admin;
use Domain\Users\UsersManager;
use Illuminate\Validation\ValidationException;

class SaveAdmin extends UsersManager
{
    /**
     * @param AdminData $data
     * @param Admin|null $admin
     * @return void
     * @throws ValidationException
     */
    public static function execute(AdminData $data, Admin $admin = null): void
    {
        self::checkRole($data);

        if ($admin !== null) {
            self::saveUser($data, $admin ->account);
            $admin ->fill([
                "agency_id" => $data->agency,
            ]) ->save();

            $admin ->syncRoles($data ->roles);
        }

        else {
            $user = self::saveUser($data);
            $user ->admin() ->create([
                "agency_id" => $data->agency,
            ]) ->assignRole($data ->roles);
        }
    }

    /**
     * @param AdminData $data
     * @return void
     * @throws ValidationException
     */
    private static function checkRole(AdminData $data): void
    {
        $role = Role::findById((is_array($data ->roles)) ? $data ->roles[0] : $data ->roles, GuardsEnum::ADMIN ->value);

        if ($data ->agency !== null && in_array($role->name, [RolesEnum::SUPER_ADMIN->value, RolesEnum::ADMIN->value], true)) {
            throw ValidationException::withMessages([
                'roles'     => __('messages.a_user_with_this_role_cannot_be_in_an_agency', ['role' => $role ->label]),
                'agency'    => __('messages.a_user_with_this_role_cannot_be_in_an_agency', ['role' => $role ->label]),
            ]);
        }

        if ($data ->agency === null && in_array($role->name, [RolesEnum::MANAGER->value, RolesEnum::AGENT->value], true)) {
            throw ValidationException::withMessages([
                'roles'     => __('messages.a_user_with_this_role_must_be_in_an_agency', ['role' => $role ->label]),
                'agency'    => __('messages.a_user_with_this_role_must_be_in_an_agency', ['role' => $role ->label]),
            ]);
        }
    }
}
