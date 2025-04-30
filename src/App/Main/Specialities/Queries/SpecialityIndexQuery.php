<?php

declare(strict_types=1);


namespace App\Main\Specialities\Queries;

use Domain\Specialities\Models\Speciality;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SpecialityIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Speciality::query();

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
