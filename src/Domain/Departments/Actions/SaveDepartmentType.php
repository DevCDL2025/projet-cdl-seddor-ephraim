<?php

declare(strict_types=1);


namespace Domain\Departments\Actions;

use Domain\Departments\Data\DepartmentTypeData;
use Domain\Departments\Models\DepartmentType;

class SaveDepartmentType
{
    public static function execute(DepartmentTypeData $data, DepartmentType $departmentType = null): void
    {
        $departmentType = $departmentType ?? new DepartmentType();

        $departmentType ->fill([
            "code"  => $data->code,
            "label" => $data->label,
        ]) ->save();
    }
}
