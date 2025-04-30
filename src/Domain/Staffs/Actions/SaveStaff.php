<?php

declare(strict_types=1);


namespace Domain\Staffs\Actions;

use Domain\Staffs\Data\StaffData;
use Domain\Staffs\Enums\StaffTypes;
use Domain\Staffs\Models\Staff;
use Domain\Users\UsersManager;

class SaveStaff extends UsersManager
{
    public static function execute(StaffData $data, Staff $staff = null, StaffTypes $types = StaffTypes::WORKER): Staff
    {
        if ($staff !== null) {
            self::saveUser($data, $staff ->account);

            $staff ->fill([
                "hire_date" => $data->hire_date,
            ]) ->save();
        }

        else {
            $user = self::saveUser($data);
            $staff = $user ->staff() ->create([
                "type" => $types ->value,
                "hire_date" => $data->hire_date,
            ]);
        }

        if ($data ->departments !== null) {
            $staff->departments()->sync($data->departments);
        }

        return $staff;
    }
}
