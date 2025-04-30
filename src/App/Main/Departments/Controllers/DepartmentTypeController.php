<?php

declare(strict_types=1);


namespace App\Main\Departments\Controllers;

use App\Main\Departments\Queries\DepartmentTypeIndexQuery;
use App\Main\Departments\Tables\DepartmentTypesTable;
use Domain\Departments\Actions\SaveDepartmentType;
use Domain\Departments\Data\DepartmentTypeData;
use Domain\Departments\Models\DepartmentType;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Http\RedirectResponse;
use Spatie\LaravelData\PaginatedDataCollection;
use Support\Controllers\ResourcesController;

class DepartmentTypeController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return DepartmentType::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::DEPARTMENT_TYPE;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DepartmentTypeIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = DepartmentTypeData::collect(
            $query ->paginate() ->appends(request()->query()),
            PaginatedDataCollection::class
        ) ->include('deleted_at');

        return inertia('DepartmentType/Index', [
            "viewElements"  => static::getListViewElements(),
            "dataTable"     => DepartmentTypesTable::make($dataRows) ->toArray(),
            "filters"       => request() ->input("search"),
            "formSchema"    => DepartmentTypeData::empty(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentTypeData $data
     *
     * @return RedirectResponse
     */
    public function store(DepartmentTypeData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveDepartmentType::execute($data);

        flash_success(__('messages.data.saved'));

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentType $departmentType
     * @param DepartmentTypeData $data
     *
     * @return RedirectResponse
     */
    public function update(DepartmentType $departmentType, DepartmentTypeData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveDepartmentType::execute($data, $departmentType);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
