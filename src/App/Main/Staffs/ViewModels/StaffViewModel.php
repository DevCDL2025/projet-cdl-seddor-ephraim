<?php

declare(strict_types=1);


namespace App\Main\Staffs\ViewModels;

use App\Main\Departments\Queries\DepartmentForStaffQuery;
use App\Main\Departments\Resources\DepartmentsForStaffFormResource;
use Domain\Positions\Models\Position;
use Domain\Specialities\Models\Speciality;
use Spatie\ViewModels\ViewModel;

class StaffViewModel extends ViewModel
{
    public function __construct(
        public DepartmentForStaffQuery $query,
    )
    {}

    public static function specialities(): array
    {
        return get_data_with_attributes_from(Speciality::class, ['id', 'code', 'label']) ->toArray();
    }

    public static function positions(): array
    {
        return get_data_with_attributes_from(Position::class, ['id', 'code', 'label']) ->toArray();
    }

    public static function specialitiesForSelect(): array
    {
        return get_data_with_attributes_from(Speciality::class, ['id', 'label']) ->map(
            function (Speciality $speciality) {
                return [
                    'value'=> $speciality->id,
                    'label'=> $speciality->label
                ];
            }
        ) ->toArray();
    }

    public static function positionsForSelect(): array
    {
        return get_data_with_attributes_from(Position::class, ['id', 'label']) ->map(
            function (Position $position) {
                return [
                    'value'=> $position->id,
                    'label'=> $position->label
                ];
            }
        ) ->toArray();
    }

    public function departments(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return DepartmentsForStaffFormResource::collection($this ->query ->paginate(28) ->appends(request()->query()));
    }
}
