<?php

declare(strict_types=1);


namespace App\Main\Staffs\ViewModels;

use App\Main\Departments\Queries\DepartmentForStaffQuery;
use Domain\Staffs\Data\NurseData;
use Domain\Staffs\Models\Nurse;
use Support\Concerns\StaticallyInstanciable;

class NurseFormViewModel extends StaffViewModel
{
    use StaticallyInstanciable;

    public function __construct(
        public DepartmentForStaffQuery $query,
        public ?Nurse                 $nurse = null,
    )
    {
        parent::__construct($query);
    }

    public function formSchema(): array|NurseData
    {
        return $this ->nurse !== null
            ? NurseData::forForm($this->nurse)
            : NurseData::empty([
                'id' => '',
                'speciality' => '',
            ]);
    }

    public function toArray(): array
    {
        return [
            "formSchema"   => $this->formSchema(),
            "specialities" => self::specialitiesForSelect(),
            "departments"  => self::departments(),
        ];
    }
}
