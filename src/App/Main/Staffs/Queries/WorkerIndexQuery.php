<?php

declare(strict_types=1);


namespace App\Main\Staffs\Queries;

use Domain\Staffs\Models\Worker;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class WorkerIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Worker::query()
            ->join('positions', 'workers.position_id', '=', 'positions.id')
            ->join('staffs', 'workers.staff_id', '=', 'staffs.id')
            ->join('users', 'staffs.user_id', '=', 'users.id')
            ->select(
                "workers._id", "workers.created_at", "workers.deleted_at",
                "users.last_name", "users.first_name", "users.email", "users.phone_number",
                "positions.label as position_label"
            );

        parent::__construct($query, $request);

        if ($request ->has("search")) {
            $query ->search(["users.last_name", "users.first_name", "users.email"], $request ->input('search'));
        }

        $this ->allowedFilters([
            AllowedFilter::exact('position_code', 'positions.code'),
            AllowedFilter::trashed(),
        ]);

        $this ->defaultSort("-workers.created_at");
    }
}
