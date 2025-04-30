<?php

declare(strict_types=1);


namespace App\Main\Permissions\Controllers;

use App\Main\Permissions\Queries\PermissionIndexQuery;
use App\Main\Permissions\Tables\PermissionsTable;
use Domain\Permissions\Actions\SavePermission;
use Domain\Permissions\Data\PermissionData;
use Domain\Permissions\Models\Permission;
use Domain\Shared\Enums\ResourcesEnum;
use Illuminate\Http\RedirectResponse;
use Spatie\LaravelData\PaginatedDataCollection;
use Support\Controllers\ResourcesController;

class PermissionController extends ResourcesController
{

    /**
     * @inheritDoc
     */
    protected function model(): ?string
    {
        return Permission::class;
    }

    /**
     * @inheritDoc
     */
    protected static function resource(): ResourcesEnum
    {
        return ResourcesEnum::PERMISSION;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(PermissionIndexQuery $query)
    {
        self::checkIfIsAllowedToView();

        $dataRows = PermissionData::collect(
            $query ->paginate() ->appends(request()->query()),
            PaginatedDataCollection::class
        ) ->include('deleted_at');

        return inertia('Permission/Index', [
            "viewElements"  => static::getListViewElements(),
            "dataTable"     => PermissionsTable::make($dataRows) ->toArray(),
            "filters"       => request() ->input("search"),
            "formSchema"    => PermissionData::empty(['id' => '']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionData $data
     *
     * @return RedirectResponse
     */
    public function store(PermissionData $data): RedirectResponse
    {
        self::checkIfIsAllowedToCreate();

        SavePermission::execute($data);

        flash_success(__('messages.data.saved'));

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Permission $permission
     * @param PermissionData $data
     *
     * @return RedirectResponse
     */
    public function update(Permission $permission, PermissionData $data): RedirectResponse
    {
        self::checkIfIsAllowedToUpdate();

        SavePermission::execute($data, $permission);

        flash_success(__('messages.data.updated'));

        return back();
    }
}
