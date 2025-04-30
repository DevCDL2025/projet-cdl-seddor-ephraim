<?php

declare(strict_types=1);


namespace Domain\Staffs\Data;

use Domain\Departments\Models\Department;
use Domain\Users\Data\SharedUserData;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Rules\EmailValidationRules;

class StaffData extends SharedUserData
{
    use EmailValidationRules;

    public ?string  $hire_date;
    public Lazy|Collection|array|null $departments = [];

    public static function rules() : array
    {
        return [
            'id'         => ['nullable'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email'      => request()->route()?->hasParameter("employee")
                ? self::uniqueEmailRulesExcept(request()->route('employee')->account->id)
                : self::uniqueEmailRules(),
            'phone_number' => ['nullable', 'string', 'max:255'],
            "departments"    => ["required", "array", "min:1"],
            "departments.*"  => ["required", "distinct", Rule::exists(Department::class, 'id')],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            "speciality" => trans_choice("displays.resource.speciality", 1),
            "departments" => trans_choice("displays.resource.department", 2),
        ];
    }
}
