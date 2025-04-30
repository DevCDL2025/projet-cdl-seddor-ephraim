<?php

declare(strict_types=1);


namespace App\Main\Permissions\Queries;

use Domain\Permissions\Models\Role;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class RoleIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Role::query();

        parent::__construct($query, $request);

        if ($request ->has("search")) {
            $query ->search(["name", "label"], $request ->input('search'));
        }

        $this ->allowedFilters([
            AllowedFilter::trashed(),
        ]);

        $this ->defaultSort("-created_at");
    }
}
