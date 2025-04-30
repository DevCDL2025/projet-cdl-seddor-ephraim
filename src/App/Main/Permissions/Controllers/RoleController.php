<?php

declare(strict_types=1);


namespace App\Main\Permissions\Controllers;

use App\Main\Permissions\Queries\PermissionIndexQuery;
use App\Main\Permissions\Queries\RoleIndexQuery;
use App\Main\Permissions\Tables\RolesTable;
use App\Main\Permissions\ViewModels\RoleFormViewModel;
use Domain\Permissions\Actions\SaveRole;
use Domain\Permissions\Data\RoleData;
use Domain\Permissions\Models\Role;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Inertia\ResponseFactory;
use Spatie\LaravelData\PaginatedDataCollection;
use Support\Controllers\ResourcesController;

class RoleController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Role::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::ROLE;
    }

    /**
     * Display a listing of the resource.
     *
     * @param RoleIndexQuery $query
     *
     * @return Response|ResponseFactory
     */
    public function index(RoleIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = RoleData::collect(
            $query ->paginate() ->appends(request()->query()),
            PaginatedDataCollection::class
        ) ->include('deleted_at');

        return inertia('Role/Index', [
            "viewElements"  => static::getListViewElements(),
            "dataTable"     => RolesTable::make($dataRows) ->toArray(),
            "filters"       => request() ->input("search"),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|ResponseFactory
     */
    public function create(PermissionIndexQuery $query)
    {
        self::checkIfIsAllowedToCreate();

        return inertia('Role/Create', [
            "viewElements"  => static::getCreateViewElements(),
            "viewModel"     => RoleFormViewModel::make(query: $query) ->toArray(),
            "filters"      => request()->input("search"),
            "queryString"  => request()->query(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SaveRole::execute($data);

        flash_success(__('messages.data.saved'));

        return to_app_route("roles.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     *
     * @return Response|ResponseFactory
     */
    public function edit(PermissionIndexQuery $query, Role $role)
    {
        self::checkIfIsAllowedToUpdate();

        return inertia('Role/Edit', [
            "viewElements"  => static::getEditViewElements(),
            "viewModel"     => RoleFormViewModel::make(query: $query, role:$role) ->toArray()
        ]);
    }

    /**
     * Update existing resource in storage.
     *
     * @param Role $role
     * @param RoleData $data
     *
     * @return RedirectResponse
     */
    public function update(Role $role, RoleData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SaveRole::execute($data, $role);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
