<?php

declare(strict_types=1);


namespace App\Main\Departments\Controllers;

use App\Main\Departments\Queries\DepartmentIndexQuery;
use App\Main\Departments\Resources\DepartmentIndexResource;
use App\Main\Departments\Tables\DepartmentsTable;
use App\Main\Departments\ViewModels\DepartmentFormViewModel;
use App\Main\Specialities\Queries\SpecialityIndexQuery;
use Domain\Departments\Actions\SaveDepartment;
use Domain\Departments\Data\DepartmentData;
use Domain\Departments\Models\Department;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;
use Support\Controllers\ResourcesController;

class DepartmentController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Department::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::DEPARTMENT;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DepartmentIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = DepartmentIndexResource::collection($query ->paginate() ->appends(request()->query()));

        return inertia('Department/Index', [
            "viewElements"    => static::getListViewElements(),
            "dataTable"       => DepartmentsTable::make($dataRows)->toArray(),
            "filters"         => request()->input("search"),
            "queryString"     => request()->query(),
            "departmentTypes" => DepartmentFormViewModel::departmentTypes(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|ResponseFactory
     */
    public function create(SpecialityIndexQuery $query)
    {
        self::checkIfIsAllowedToCreate();

        return inertia('Department/Create', [
            "viewElements" => static::getCreateViewElements(),
            "viewModel"    => DepartmentFormViewModel::make(query: $query)->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(DepartmentData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveDepartment::execute($data);

        flash_success(__('messages.data.saved'));

        return to_app_route(static::resource() ->plural() . ".index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     *
     * @return Response|ResponseFactory
     */
    public function edit(SpecialityIndexQuery $query, Department $department)
    {
        self::checkIfIsAllowedToUpdate();

        return inertia('Department/Edit', [
            "viewElements"  => static::getEditViewElements(),
            "viewModel"    => DepartmentFormViewModel::make(query: $query, department: $department) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Update existing resource in storage.
     *
     * @param Department $department
     * @param DepartmentData $data
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Department $department, DepartmentData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveDepartment::execute($data, $department);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
