<?php

declare(strict_types=1);


namespace Domain\Permissions\Data;

use Domain\Permissions\Models\Permission;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Data\HasDateTransformer;
use Support\Concerns\Rules\ContentValidationRules;

class PermissionData extends Data
{
    use ContentValidationRules, HasDateTransformer;

    public function __construct(
        public int|string|null  $id = null,
        public string           $name,
        public ?string          $label,
        public ?string          $description,
        public Lazy|string|null $created_at = null,
        public Lazy|string|null $deleted_at = null,
    )
    {}

    public static function rules() : array
    {
        return [
            "id"          => "nullable",
            "name"        => [
                "required", "string",
                Rule::unique(Permission::class, 'name')->ignore(request()->route('permission'))
            ],
            "label"       => ["nullable", "string"],
            "description" => self::nullableContentRules(),
        ];
    }

    public static function fromModel(Permission $permission): self
    {
        return new self(
            id: $permission->_id,
            name: $permission->name,
            label: $permission->label,
            description: $permission->description,
            created_at: self::getTransformedLazyDate($permission->created_at),
            deleted_at: Lazy::create(static fn() => $permission->deleted_at),
        );
    }
}
