<?php

declare(strict_types=1);


namespace Domain\Users\Data;

use Domain\Permissions\Models\Role;
use Domain\Users\Models\Admin;
use Illuminate\Validation\Rule;
use Support\Concerns\Rules\EmailValidationRules;

class AdminData extends SharedUserData
{
    use EmailValidationRules;

    public array|int|string $roles  = [];
    public int|string|null  $agency = null;

    public static function rules() : array
    {
        return [
            'id'         => ['nullable'],
            'last_name'  => ['nullable', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email'      => request()->route()?->hasParameter("admin")
                ? self::uniqueEmailRulesExcept(request()->route('admin')->account->id)
                : self::uniqueEmailRules(),
            "roles"      => ["required"],
            "roles.*"    => [Rule::exists(Role::class, 'id')],
            "agency"     => ["nullable"],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            "agency"    => trans_choice("displays.resource.agency", 1),
            "roles"     => trans_choice("displays.resource.role", 1),
        ];
    }

    public static function forForm(Admin $admin): self
    {
        return self::from([
            "id"         => $admin->_id,
            "last_name"  => $admin->account->last_name,
            "first_name" => $admin->account->first_name,
            "email"      => $admin->account->email,
            "roles"      => $admin->roles->pluck('id')->toArray()[0],
            "agency"     => $admin->agency?->id,
        ]);
    }
}
