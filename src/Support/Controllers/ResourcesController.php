<?php

declare(strict_types=1);


namespace Support\Controllers;

use Domain\Permissions\Enums\PermissionsEnum;
use Domain\Status\Data\StatusData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Support\Controllers\Traits\HasAuthorizationManager;
use Support\Controllers\Traits\HasModelResolver;
use Support\Controllers\Traits\HasResourcesResolver;
use Support\ViewElements\Traits\HasResourcesViewElements;

abstract class ResourcesController
{
    use HasModelResolver,
        HasResourcesResolver,
        HasResourcesViewElements,
        HasAuthorizationManager;

    public function __construct()
    {
        $this->model         = app($this->model());
        self::$resourcesEnum = static::resource();
    }

    public function changeStatus(StatusData $data, $id): RedirectResponse
    {
        abort_if_not_allowed_to(PermissionsEnum::MANAGE_STATUS ->value);

        $this ->findData($id) ->update([
            "status" => $data->status
        ]);

        flash_success(__('messages.status.changed'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        self::checkIfIsAllowedToDelete();

        $this ->findData($id) ->delete();

        flash_success(__('messages.data.deleted'));

        return to_app_route(static::resource() ->plural().'.index');
    }

    /**
     * Restore the specified resource in storage.
     *
     * @param $id
     *
     * @return RedirectResponse
     */
    public function restore($id): RedirectResponse
    {
        self::checkIfIsAllowedToRestore();

        $this ->findData($id, true) ->restore();

        flash_success(__('messages.data.restored'));

        return back();
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param $id
     *
     * @return RedirectResponse
     */
    public function forceDelete($id): RedirectResponse
    {
        self::checkIfIsAllowedToForceDelete();

        $this ->findData($id, true) ->forceDelete();

        flash_success(__('messages.data.removed'));

        return back();
    }

    private function findData($id, $trashed = false)
    {
        $query = $this->model;

        if ($trashed) {
            $query = $query -> withTrashed();
        }

        if (Str::isUuid($id)) {
            $query = $query ->whereUuid($id);
        }

        else {
            $query = $query ->find($id);
        }

        return $query;
    }
}
