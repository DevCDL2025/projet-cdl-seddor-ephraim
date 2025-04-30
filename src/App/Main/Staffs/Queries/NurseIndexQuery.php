<?php

declare(strict_types=1);


namespace App\Main\Staffs\Queries;

use Domain\Staffs\Models\Nurse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class NurseIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Nurse::query()
            ->join('specialities', 'nurses.speciality_id', '=', 'specialities.id')
            ->join('staffs', 'nurses.staff_id', '=', 'staffs.id')
            ->join('users', 'staffs.user_id', '=', 'users.id')
            ->select(
                "nurses._id", "nurses.created_at", "nurses.deleted_at",
                "users.last_name", "users.first_name", "users.email", "users.phone_number",
                "specialities.label as speciality_label"
            );

        parent::__construct($query, $request);

        if ($request ->has("search")) {
            $query ->search(["users.last_name", "users.first_name", "users.email"], $request ->input('search'));
        }

        $this ->allowedFilters([
            AllowedFilter::exact('speciality_code', 'specialities.code'),
            AllowedFilter::trashed(),
        ]);

        $this ->defaultSort("-nurses.created_at");
    }
}
