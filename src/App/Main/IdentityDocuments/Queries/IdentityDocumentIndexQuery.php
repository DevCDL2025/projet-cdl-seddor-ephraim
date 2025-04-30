<?php

declare(strict_types=1);


namespace App\Main\IdentityDocuments\Queries;

use Domain\IdentityDocuments\Models\IdentityDocument;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IdentityDocumentIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = IdentityDocument::query();

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
