<?php

declare(strict_types=1);


namespace Domain\Doctors\Actions;

use Domain\Doctors\Data\DoctorData;
use Domain\Doctors\Models\Doctor;
use Domain\Staffs\Actions\SaveStaff;
use Domain\Staffs\Enums\StaffTypes;
use Domain\Users\UsersManager;

class SaveDoctor extends UsersManager
{
    public static function execute(DoctorData $data, Doctor $doctor = null): int|Doctor
    {
        $staff = SaveStaff::execute($data, $doctor ?->staff, StaffTypes::DOCTOR);

        if ($doctor !== null) {
            $doctor = $staff ->doctor()->update([
                "speciality_id" => $data->speciality,
            ]);
        }

        else {
            $doctor = $staff ->doctor()->create([
                "speciality_id" => $data->speciality,
            ]);
        }

        return $doctor;
    }
}
