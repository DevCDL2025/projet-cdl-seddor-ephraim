<?php

declare(strict_types=1);


namespace Domain\Departments\Actions;

use Domain\Departments\Data\DepartmentData;
use Domain\Departments\Models\Department;

class SaveDepartment
{
    public static function execute(DepartmentData $data, Department $department = null) : void
    {
        $department = $department ?? new Department();

        $department->fill([
            "code"               => $data->code,
            "label"              => $data->label,
            "description"        => $data->description,
            "department_type_id" => $data->department_type,
        ]) ->save();

        $department ->specialities() ->sync($data->specialities);
    }
}
