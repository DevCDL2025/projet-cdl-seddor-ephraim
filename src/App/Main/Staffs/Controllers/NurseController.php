<?php

declare(strict_types=1);


namespace App\Main\Staffs\Controllers;

use App\Main\Departments\Queries\DepartmentForStaffQuery;
use App\Main\Staffs\Queries\NurseIndexQuery;
use App\Main\Staffs\Resources\NurseIndexResource;
use App\Main\Staffs\ViewModels\NurseFormViewModel;
use App\Main\Staffs\ViewModels\StaffViewModel;
use Domain\Shared\Enums\ResourcesEnum;
use Domain\Staffs\Actions\SaveNurse;
use Domain\Staffs\Data\NurseData;
use Domain\Staffs\Models\Nurse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;
use Support\Controllers\ResourcesController;

class NurseController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Nurse::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::NURSE;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(NurseIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = NurseIndexResource::collection($query ->paginate() ->appends(request()->query()));

        return inertia('Nurse/Index', [
            "viewElements" => static::getListViewElements(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
            "specialities" => StaffViewModel::specialities(),
            "dataRows"     => $dataRows,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|ResponseFactory
     */
    public function create(DepartmentForStaffQuery $query)
    {
        self::checkIfIsAllowedToCreate();

        return inertia('Nurse/Create', [
            "viewElements" => static::getCreateViewElements(),
            "viewModel"    => NurseFormViewModel::make(query: $query) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(NurseData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveNurse::execute($data);

        flash_success(__('messages.data.saved'));

        return to_app_route(static::resource() ->plural() . ".index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Nurse $nurse
     * @return Response|ResponseFactory
     */
    public function edit(DepartmentForStaffQuery $query, Nurse $nurse)
    {
        self::checkIfIsAllowedToUpdate();

        return inertia('Nurse/Edit', [
            "viewElements"  => static::getEditViewElements(),
            "viewModel"    => NurseFormViewModel::make(query: $query, nurse: $nurse) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Update existing resource in storage.
     *
     * @param Nurse $nurse
     * @return RedirectResponse
     */
    public function update(NurseData $data, Nurse $nurse): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveNurse::execute($data, $nurse);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
