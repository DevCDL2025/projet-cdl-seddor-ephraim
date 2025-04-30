<?php

declare(strict_types=1);


namespace Domain\Departments\Data;

use Domain\Departments\Models\DepartmentType;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Data\HasDateTransformer;

class DepartmentTypeData extends Data
{
    use HasDateTransformer;

    public function __construct(
        public ?string          $id = null,
        public ?string          $code = null,
        public string           $label,
        public Lazy|string|null $created_at = null,
        public Lazy|string|null $deleted_at = null,
    )
    {}

    public static function rules() : array
    {
        return [
            "code"          => [
                "nullable", "string",
                Rule::unique(DepartmentType::class, 'code') ->ignore(request()->route('departmentType'))
            ],
            "label"         => ["required", "string"]
        ];
    }

    public static function fromModel(DepartmentType $departmentType): self
    {
        return new self(
            id: $departmentType ->_id,
            code: $departmentType->code,
            label: $departmentType->label,
            created_at: self::getTransformedLazyDate($departmentType->created_at),
            deleted_at: Lazy::create(static fn () => $departmentType ->deleted_at),
        );
    }

    public static function forForm(DepartmentType $departmentType): self
    {
        return new self(
            id: $departmentType ->_id,
            code: $departmentType->code,
            label: $departmentType->label,
        );
    }
}
