<?php

declare(strict_types=1);


namespace App\Main\Doctors\Controllers;

use App\Main\Departments\Queries\DepartmentForStaffQuery;
use App\Main\Doctors\Queries\DoctorIndexQuery;
use App\Main\Doctors\Resources\DoctorIndexResource;
use App\Main\Doctors\ViewModels\DoctorFormViewModel;
use App\Main\Staffs\ViewModels\StaffViewModel;
use Domain\Doctors\Actions\SaveDoctor;
use Domain\Doctors\Data\DoctorData;
use Domain\Doctors\Models\Doctor;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;
use PhpParser\Comment\Doc;
use Support\Controllers\ResourcesController;

class DoctorController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Doctor::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::DOCTOR;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DoctorIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = DoctorIndexResource::collection($query ->paginate() ->appends(request()->query()));

        return inertia('Doctor/Index', [
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

        return inertia('Doctor/Create', [
            "viewElements" => static::getCreateViewElements(),
            "viewModel"    => DoctorFormViewModel::make(query: $query) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(DoctorData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveDoctor::execute($data);

        flash_success(__('messages.data.saved'));

        return to_app_route(static::resource() ->plural() . ".index");
    }

    public function show(Doctor $doctor)
    {
        return inertia('Doctor/Show', [
            "viewElements"  => static::getShowViewElements(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Doctor $doctor
     * @return Response|ResponseFactory
     */
    public function edit(DepartmentForStaffQuery $query, Doctor $doctor)
    {
        self::checkIfIsAllowedToUpdate();

        return inertia('Doctor/Edit', [
            "viewElements"  => static::getEditViewElements(),
            "viewModel"    => DoctorFormViewModel::make(query: $query, doctor: $doctor) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Update existing resource in storage.
     *
     * @param Doctor $doctor
     * @return RedirectResponse
     */
    public function update(DoctorData $data, Doctor $doctor): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveDoctor::execute($data, $doctor);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
