<?php

declare(strict_types=1);


namespace Domain\Staffs\Data;

use Domain\Specialities\Models\Speciality;
use Domain\Staffs\Models\Nurse;
use Illuminate\Validation\Rule;
use Support\Concerns\Rules\EmailValidationRules;

class NurseData extends StaffData
{
    use EmailValidationRules;

    public int|string  $speciality;

    public static function rules() : array
    {
        return [
            'id'         => ['nullable'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email'      => request()->route()?->hasParameter("nurse")
                ? self::uniqueEmailRulesExcept(request()->route('nurse') ->staff ->account->id)
                : self::uniqueEmailRules(),
            'phone_number' => ['nullable', 'string', 'max:255'],
            "speciality" => [Rule::exists(Speciality::class, 'id')],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            "speciality" => trans_choice("displays.resource.speciality", 1),
        ];
    }

    public static function forForm(Nurse $nurse): self
    {
        return self::from([
            "id"           => $nurse->_id,
            "last_name"    => $nurse->staff->account->last_name,
            "first_name"   => $nurse->staff->account->first_name,
            "email"        => $nurse->staff->account->email,
            "phone_number" => $nurse->staff->account->phone_number,
            "speciality"   => $nurse->speciality->id,
            "departments"  => $nurse->staff->departments->pluck('id')->toArray()
        ]);
    }
}
