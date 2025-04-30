<?php

declare(strict_types=1);


namespace Domain\Permissions\Data;

use Domain\Permissions\Models\Permission;
use Domain\Permissions\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Data\HasDateTransformer;
use Support\Concerns\Rules\ContentValidationRules;

class RoleData extends Data
{
    use ContentValidationRules, HasDateTransformer;

    public function __construct(
        public int|string|null            $id,
        public string                     $name,
        public ?string                    $label = null,
        public ?string                    $description = null,
        public Lazy|Collection|array|null $permissions = [],
        public Lazy|string|null           $created_at = null,
        public Lazy|string|null           $deleted_at = null,
    )
    {}

    public static function rules() : array
    {
        return [
            "id"            => "nullable",
            "name"          => [
                "required", "string",
                Rule::unique(Role::class, 'name')->ignore(request()->route('role'))
            ],
            "label"         => ["nullable", "string"],
            "description"   => self::nullableContentRules(),
            "permissions"   => ["required", "array", "min:1"],
            "permissions.*" => ["required", "distinct", Rule::exists(Permission::class, 'id')],
        ];
    }

    public static function fromModel(Role $role): self
    {
        return new self(
            id: $role ->_id,
            name: $role->name,
            label: $role->label,
            description: $role->description,
            permissions: Lazy::create(static fn () => PermissionData::collect($role ->permissions)),
            created_at: self::getTransformedLazyDate($role->created_at),
            deleted_at: Lazy::create(static fn () => $role ->deleted_at),
        );
    }

    public static function forForm(Role $role): self
    {
        return new self(
            id: $role ->_id,
            name: $role->name,
            label: $role->label,
            description: $role->description,
            permissions: $role->permissions->pluck('id') ->toArray()
        );
    }
}
