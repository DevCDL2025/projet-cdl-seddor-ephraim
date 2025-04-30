<?php

declare(strict_types=1);


namespace App\Main\Doctors\Queries;

use Domain\Doctors\Models\Doctor;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DoctorIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Doctor::query()
            ->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
            ->join('staffs', 'doctors.staff_id', '=', 'staffs.id')
            ->join('users', 'staffs.user_id', '=', 'users.id')
            ->select(
                "doctors._id", "doctors.created_at", "doctors.deleted_at",
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

        $this ->defaultSort("-doctors.created_at");
    }

}
