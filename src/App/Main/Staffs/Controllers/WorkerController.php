<?php

declare(strict_types=1);


namespace App\Main\Staffs\Controllers;

use App\Main\Departments\Queries\DepartmentForStaffQuery;
use App\Main\Staffs\Queries\WorkerIndexQuery;
use App\Main\Staffs\Resources\WorkerIndexResource;
use App\Main\Staffs\ViewModels\StaffViewModel;
use App\Main\Staffs\ViewModels\WorkerFormViewModel;
use Domain\Shared\Enums\ResourcesEnum;
use Domain\Staffs\Actions\SaveWorker;
use Domain\Staffs\Data\WorkerData;
use Domain\Staffs\Models\Worker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;
use Support\Controllers\ResourcesController;

class WorkerController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Worker::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::WORKER;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(WorkerIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = WorkerIndexResource::collection($query ->paginate() ->appends(request()->query()));

        return inertia('Worker/Index', [
            "viewElements" => static::getListViewElements(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
            "positions" => StaffViewModel::positions(),
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

        return inertia('Worker/Create', [
            "viewElements" => static::getCreateViewElements(),
            "viewModel"    => WorkerFormViewModel::make(query: $query) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(WorkerData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveWorker::execute($data);

        flash_success(__('messages.data.saved'));

        return to_app_route(static::resource() ->plural() . ".index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DepartmentForStaffQuery $query
     * @param Worker $worker
     * @return Response|ResponseFactory
     */
    public function edit(DepartmentForStaffQuery $query, Worker $worker)
    {
        self::checkIfIsAllowedToUpdate();

        return inertia('Worker/Edit', [
            "viewElements"  => static::getEditViewElements(),
            "viewModel"    => WorkerFormViewModel::make(query: $query, Worker: $worker) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Update existing resource in storage.
     *
     * @param WorkerData $data
     * @param Worker $worker
     * @return RedirectResponse
     */
    public function update(WorkerData $data, Worker $worker): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveWorker::execute($data, $worker);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
