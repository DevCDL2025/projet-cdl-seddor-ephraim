<?php

declare(strict_types=1);


namespace Domain\Doctors\Data;

use Domain\Doctors\Models\Doctor;
use Domain\Specialities\Models\Speciality;
use Domain\Staffs\Data\StaffData;
use Illuminate\Validation\Rule;
use Support\Concerns\Rules\EmailValidationRules;

class DoctorData extends StaffData
{
    use EmailValidationRules;

    public int|string  $speciality;

    public static function rules() : array
    {
        return [
            'id'         => ['nullable'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email'      => request()->route()?->hasParameter("doctor")
                ? self::uniqueEmailRulesExcept(request()->route('doctor') ->staff ->account->id)
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

    public static function forForm(Doctor $doctor): self
    {
        return self::from([
            "id"           => $doctor->_id,
            "last_name"    => $doctor->staff->account->last_name,
            "first_name"   => $doctor->staff->account->first_name,
            "email"        => $doctor->staff->account->email,
            "phone_number" => $doctor->staff->account->phone_number,
            "speciality"   => $doctor->speciality->id,
            "departments"  => $doctor->staff->departments->pluck('id')->toArray()
        ]);
    }
}
