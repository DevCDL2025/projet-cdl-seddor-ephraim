<?php

declare(strict_types=1);


namespace App\Main\Departments\Queries;

use Domain\Departments\Models\Department;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DepartmentIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Department::query()
            ->join('department_types', 'departments.department_type_id', '=', 'department_types.id')
            ->select(
                "departments._id", "departments.created_at",  "departments.deleted_at",
                "departments.code as department_code",
                "departments.label as department_label",
                "department_types.label as department_type_label",
            )
            ->withCount(["specialities", "staffs"]);

        parent::__construct($query, $request);

        if ($request ->has("search")) {
            $query ->search(["departments.code", "departments.label"], $request ->input('search'));
        }

        $this ->allowedFilters([
            "status",
            AllowedFilter::partial('department_type_code', 'department_types.code'),
            AllowedFilter::trashed(),
        ]);

        $this ->defaultSort("-departments.created_at");
    }
}
