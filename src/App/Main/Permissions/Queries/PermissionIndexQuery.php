<?php

declare(strict_types=1);


namespace App\Main\Permissions\Queries;

use Domain\Permissions\Models\Permission;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PermissionIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Permission::query();

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
