<?php

declare(strict_types=1);


namespace App\Main\Staffs\ViewModels;

use App\Main\Departments\Queries\DepartmentForStaffQuery;
use Domain\Staffs\Data\WorkerData;
use Domain\Staffs\Models\Worker;
use Support\Concerns\StaticallyInstanciable;

class WorkerFormViewModel extends StaffViewModel
{
    use StaticallyInstanciable;

    public function __construct(
        public DepartmentForStaffQuery $query,
        public ?Worker                 $worker = null,
    )
    {
        parent::__construct($query);
    }

    public function formSchema(): array|WorkerData
    {
        return $this ->worker !== null
            ? WorkerData::forForm($this->worker)
            : WorkerData::empty([
                'id' => '',
                'position' => '',
            ]);
    }

    public function toArray(): array
    {
        return [
            "formSchema"  => $this->formSchema(),
            "positions"   => self::positionsForSelect(),
            "departments" => self::departments(),
        ];
    }
}
