<?php

declare(strict_types=1);


namespace Domain\Staffs\Actions;

use Domain\Staffs\Data\NurseData;
use Domain\Staffs\Enums\StaffTypes;
use Domain\Staffs\Models\Nurse;

class SaveNurse
{
    public static function execute(NurseData $data, Nurse $nurse = null): int|Nurse
    {
        $staff = SaveStaff::execute($data, $nurse ?->staff, StaffTypes::NURSE);

        if ($nurse !== null) {
            $nurse = $staff ->nurses()->update([
                "speciality_id" => $data->speciality,
            ]);
        }

        else {
            $nurse = $staff ->nurses()->create([
                "speciality_id" => $data->speciality,
            ]);
        }

        return $nurse;
    }
}
