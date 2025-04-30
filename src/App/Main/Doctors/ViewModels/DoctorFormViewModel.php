<?php

declare(strict_types=1);


namespace App\Main\Doctors\ViewModels;

use App\Main\Departments\Queries\DepartmentIndexQuery;
use App\Main\Staffs\ViewModels\StaffViewModel;
use Domain\Doctors\Data\DoctorData;
use Domain\Doctors\Models\Doctor;
use Support\Concerns\StaticallyInstanciable;
use App\Main\Departments\Queries\DepartmentForStaffQuery;

class DoctorFormViewModel extends StaffViewModel
{
    use StaticallyInstanciable;

    public function __construct(
        public DepartmentForStaffQuery $query,
        public ?Doctor                 $doctor = null,
    )
    {
        parent::__construct($query);
    }

    public function formSchema(): array|DoctorData
    {
        return $this ->doctor !== null
            ? DoctorData::forForm($this->doctor)
            : DoctorData::empty([
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
