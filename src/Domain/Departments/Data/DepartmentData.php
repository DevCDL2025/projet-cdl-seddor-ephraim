<?php

declare(strict_types=1);


namespace Domain\Departments\Data;

use Domain\Departments\Models\Department;
use Domain\Departments\Models\DepartmentType;
use Domain\Specialities\Data\SpecialityData;
use Domain\Specialities\Models\Speciality;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Data\HasDateTransformer;

class DepartmentData extends Data
{
    use HasDateTransformer;

    public function __construct(
        public ?string                    $id = null,
        public ?string                    $code = null,
        public string                     $label,
        public ?string                    $description = null,
        public string|int|null            $department_type = null,
        public Lazy|Collection|array|null $specialities = [],
        public Lazy|string|null           $created_at = null,
        public Lazy|string|null           $deleted_at = null,
    )
    {}

    public static function rules() : array
    {
        return [
            "code"            => [
                "nullable", "string",
                Rule::unique(Department::class, 'code')->ignore(request()->route('department'))
            ],
            "label"           => ["required", "string"],
            "description"     => ["nullable", "string"],
            "department_type" => [Rule::exists(DepartmentType::class, 'id')],
            "specialities"    => ["required", "array", "min:1"],
            "specialities.*"  => ["required", "distinct", Rule::exists(Speciality::class, 'id')],
        ];
    }

    public static function attributes(...$args): array
    {
        return [
            "department_type" => trans_choice("displays.resource.department-type", 1),
        ];
    }

    public static function fromModel(Department $department): self
    {
        return new self(
            id: $department ->_id,
            code: $department->code,
            label: $department->label,
            description: $department->description,
            department_type: $department->departmentType ?->label,
            specialities: Lazy::create(static fn () => SpecialityData::collect($department ->specialities)),
            created_at: self::getTransformedLazyDate($department->created_at),
            deleted_at: Lazy::create(static fn () => $department ->deleted_at),
        );
    }

    public static function forForm(Department $department): self
    {
        return new self(
            id: $department ->_id,
            code: $department->code,
            label: $department->label,
            description: $department->description,
            department_type: $department->departmentType ->id,
            specialities: $department->specialities->pluck('id') ->toArray()
        );
    }
}
