<?php

declare(strict_types=1);


namespace Domain\Staffs\Data;

use Domain\Positions\Models\Position;
use Domain\Staffs\Data\StaffData;
use Domain\Staffs\Models\Worker;
use Illuminate\Validation\Rule;
use Support\Concerns\Rules\EmailValidationRules;

class WorkerData extends StaffData
{
    use EmailValidationRules;

    public int|string  $position;

    public static function rules() : array
    {
        return [
            'id'         => ['nullable'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email'      => request()->route()?->hasParameter("worker")
                ? self::uniqueEmailRulesExcept(request()->route('worker') ->staff ->account->id)
                : self::uniqueEmailRules(),
            'phone_number' => ['nullable', 'string', 'max:255'],
            "position" => [Rule::exists(Position::class, 'id')],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            "position" => trans_choice("displays.resource.position", 1),
        ];
    }

    public static function forForm(Worker $worker): self
    {
        return self::from([
            "id"           => $worker->_id,
            "last_name"    => $worker->staff->account->last_name,
            "first_name"   => $worker->staff->account->first_name,
            "email"        => $worker->staff->account->email,
            "phone_number" => $worker->staff->account->phone_number,
            "position"   => $worker->position->id,
            "departments"  => $worker->staff->departments->pluck('id')->toArray()
        ]);
    }
}
