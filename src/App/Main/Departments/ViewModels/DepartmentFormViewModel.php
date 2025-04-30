<?php

declare(strict_types=1);


namespace App\Main\Departments\ViewModels;

use App\Main\Specialities\Queries\SpecialityIndexQuery;
use App\Main\Specialities\Resources\SpecialitiesForDepartmentFormResource;
use Domain\Departments\Data\DepartmentData;
use Domain\Departments\Models\Department;
use Domain\Departments\Models\DepartmentType;
use Spatie\ViewModels\ViewModel;
use Support\Concerns\StaticallyInstanciable;

class DepartmentFormViewModel extends ViewModel
{
    use StaticallyInstanciable;

    public function __construct(
        public SpecialityIndexQuery $query,
        public ?Department $department = null,
    )
    {}

    public function formSchema(): array|DepartmentData
    {
        return $this ->department !== null
            ? DepartmentData::forForm($this->department)
            : DepartmentData::empty(['id' => '']);
    }

    public static function departmentTypes(): array
    {
        return get_data_with_attributes_from(DepartmentType::class, ['id', 'code', 'label']) ->toArray();
    }

    public function specialities(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return SpecialitiesForDepartmentFormResource::collection($this ->query ->paginate(28) ->appends(request()->query()));
    }

    public function toArray(): array
    {
        return [
            "formSchema"      => $this->formSchema(),
            "departmentTypes" => self::departmentTypes(),
            "specialities"    => self::specialities(),
        ];
    }
}
