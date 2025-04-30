<?php

declare(strict_types=1);


namespace App\Main\Departments\Queries;

use Domain\Departments\Models\Department;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DepartmentForStaffQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Department::query()
            ->select(
                "id", "label"
            );

        parent::__construct($query, $request);

        if ($request ->has("search")) {
            $query ->search(["departments.code", "departments.label"], $request ->input('search'));
        }

        $this ->defaultSort("-departments.created_at");
    }
}
