<?php

declare(strict_types=1);


namespace App\Main\Users\Controllers;

use App\Main\Users\Queries\AdminIndexQuery;
use App\Main\Users\Resources\AdminIndexResource;
use App\Main\Users\Tables\AdminsTable;
use App\Main\Users\ViewModels\AdminFormViewModel;
use Domain\Permissions\Services\PermissionService;
use Domain\Shared\Enums\ResourcesEnum;
use Domain\Users\Actions\SaveAdmin;
use Domain\Users\Data\AdminData;
use Domain\Users\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Inertia\Response;
use Inertia\ResponseFactory;
use Support\Controllers\ResourcesController;

class AdminController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Admin::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::USER;
    }

    /**
     * Display a listing of the resource.
     *
     * @param AdminIndexQuery $query
     *
     * @return Response|ResponseFactory
     */
    public function index(AdminIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = AdminIndexResource::collection($query ->paginate() ->appends(request()->query()));

        return inertia('Admin/Index', [
            "viewElements"      => static::getListViewElements(),
            "dataTable"         => AdminsTable::make($dataRows) ->toArray(),
            "filters"           => request() ->input("search"),
            "queryString"       => request() ->query(),
            "roles"             => PermissionService::getRolesWithAttributes(['name', 'label'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|ResponseFactory
     */
    public function create()
    {
        self::checkIfIsAllowedToCreate();

        return inertia('Admin/Create', [
            "viewElements"  => static::getCreateViewElements(),
            "viewModel"     => AdminFormViewModel::make() ->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws ValidationException
     */
    public function store(AdminData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveAdmin::execute($data);

        flash_success(__('messages.data.saved'));

        return to_app_route(static::resource() ->plural() . ".index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Admin $admin
     *
     * @return Response|ResponseFactory
     */
    public function edit(Admin $admin)
    {
        self::checkIfIsAllowedToUpdate();

        return inertia('Admin/Edit', [
            "viewElements"  => static::getEditViewElements(),
            "viewModel"     => AdminFormViewModel::make($admin) ->toArray()
        ]);
    }

    /**
     * Update existing resource in storage.
     *
     * @param Admin $admin
     * @param AdminData $data
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Admin $admin, AdminData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveAdmin::execute($data, $admin);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
