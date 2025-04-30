<?php

namespace Database\Seeders;

use Domain\Departments\Enums\DepartmentEnum;
use Domain\Departments\Enums\DepartmentTypeEnum;
use Domain\Departments\Models\Department;
use Domain\Departments\Models\DepartmentType;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "\e[32mSeeding:\e[0m Department Types \r\n";

        $departments = DepartmentTypeEnum::cases();

        foreach ($departments as $department) {
            DepartmentType::create([
                "code" => $department ->value,
                "label" => $department ->label(),
            ]);
        }


        echo "\e[32mSeeding:\e[0m Departments \r\n";

        $departments = DepartmentEnum::cases();

        foreach ($departments as $department) {
            $deptType = DepartmentType::where("code", $department -> type())->first();

            Department::create([
                "code" => $department ->value,
                "label" => $department ->label(),
                "description" => $department ->description(),
                "department_type_id" => $deptType ->id,
            ]);
        }
    }
}
