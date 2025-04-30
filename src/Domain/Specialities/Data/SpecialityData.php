<?php

declare(strict_types=1);


namespace Domain\Specialities\Data;

use Domain\Specialities\Models\Speciality;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Data\HasDateTransformer;

class SpecialityData extends Data
{
    use HasDateTransformer;

    public function __construct(
        public ?string          $id = null,
        public ?string          $code = null,
        public string           $label,
        public ?string          $description = null,
        public Lazy|string|null $created_at = null,
        public Lazy|string|null $deleted_at = null,
    )
    {}

    public static function rules() : array
    {
        return [
            "code"          => [
                "nullable", "string",
                Rule::unique(Speciality::class, 'code') ->ignore(request()->route('speciality'))
            ],
            "label"         => ["required", "string"],
            "description"   => ["nullable", "string"],
        ];
    }

    public static function fromModel(Speciality $speciality): self
    {
        return new self(
            id: $speciality ->_id,
            code: $speciality->code,
            label: $speciality->label,
            description: $speciality->description,
            created_at: self::getTransformedLazyDate($speciality->created_at),
            deleted_at: Lazy::create(static fn () => $speciality ->deleted_at),
        );
    }

    public static function forForm(Speciality $speciality): self
    {
        return new self(
            id: $speciality ->_id,
            code: $speciality->code,
            label: $speciality->label,
            description: $speciality->description,
        );
    }
}
