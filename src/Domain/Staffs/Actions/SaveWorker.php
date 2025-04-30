<?php

declare(strict_types=1);


namespace Domain\Staffs\Actions;

use Domain\Staffs\Data\WorkerData;
use Domain\Staffs\Enums\StaffTypes;
use Domain\Staffs\Models\Worker;

class SaveWorker
{
    public static function execute(WorkerData $data, Worker $worker = null): int|Worker
    {
        $staff = SaveStaff::execute($data, $worker ?->staff, StaffTypes::DOCTOR);

        if ($worker !== null) {
            $worker = $staff ->workers()->update([
                "position_id" => $data->position,
            ]);
        }

        else {
            $worker = $staff ->workers()->create([
                "position_id" => $data->position,
            ]);
        }

        return $worker;
    }
}
