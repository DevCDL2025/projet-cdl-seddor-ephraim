<?php

declare(strict_types=1);


namespace App\Main\Positions\Queries;

use Domain\Positions\Models\Position;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PositionIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Position::query();

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
