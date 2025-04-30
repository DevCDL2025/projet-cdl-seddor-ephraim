<?php

declare(strict_types=1);


namespace App\Main\Dashboard\Controllers;

use Domain\Agencies\Model\Agency;
use Domain\Countries\Models\City;
use Domain\Countries\Models\Country;
use Domain\Departments\Models\Department;
use Domain\Doctors\Models\Doctor;
use Domain\Packages\Models\Package;
use Domain\Positions\Models\Position;
use Domain\Shippings\Models\Shipping;
use Domain\Specialities\Models\Speciality;
use Domain\Staffs\Models\Nurse;
use Domain\Staffs\Models\Worker;
use Domain\Transfers\Models\Transfer;
use Domain\Users\Models\User;
use Support\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function __invoke()
    {
        return inertia("Dashboard/GlobalDashboard", [
            "viewElements" => static::getViewElementsFor('dashboard'),
            "total" => [
                "speciality"     => Speciality::count(),
                "department"     => Department::count(),
                "position"     => Position::count(),
                "doctor"     => Doctor::count(),
                "nurse"     => Nurse::count(),
                "worker"     => Worker::count(),
            ]
        ]);
    }
}
