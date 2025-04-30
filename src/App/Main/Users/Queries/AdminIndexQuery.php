<?php

declare(strict_types=1);


namespace App\Main\Users\Queries;

use Domain\Permissions\Enums\RolesEnum;
use Domain\Users\Models\Admin;
use Domain\Users\UsersManager;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AdminIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Admin::query()
            ->join('users', 'admins.user_id', '=', 'users.id')
            ->leftJoin('model_has_roles', 'admins.id', '=', 'model_has_roles.model_id')
            ->where('model_has_roles.model_type', '=', Admin::class)
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select(
                "admins._id", "admins.created_at", "admins.deleted_at",
                "users.last_name", "users.first_name", "users.email",
                "roles._id as role_id", "roles.label as role_label",
            );

        if (!auth_user_role_is(RolesEnum::SUPER_ADMIN)) {
            $query->whereNotIn('roles.name', [RolesEnum::SUPER_ADMIN->value]);
        }

        parent::__construct($query, $request);

        if ($request ->has("search")) {
            $query ->search(["users.last_name", "users.first_name", "users.email"], $request ->input('search'));
        }

        $this ->allowedFilters([
            AllowedFilter::exact('role_name', 'roles.name'),
            AllowedFilter::partial('agency_code', 'agencies.code'),
            AllowedFilter::trashed(),
        ]);

        $this ->defaultSort("-admins.created_at");
    }
}
