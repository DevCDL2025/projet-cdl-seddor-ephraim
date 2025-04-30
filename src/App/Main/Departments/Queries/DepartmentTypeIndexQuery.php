<?php

declare(strict_types=1);


namespace App\Main\Departments\Queries;

use Domain\Departments\Models\DepartmentType;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DepartmentTypeIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = DepartmentType::query();

        parent::__construct($query, $request);

        if ($request ->has("search")) {
            $query ->search(["code", "label"], $request ->input('search'));
        }

        $this ->allowedFilters([
            AllowedFilter::trashed(),
        ]);

        $this ->defaultSort("-created_at");
    }
}
