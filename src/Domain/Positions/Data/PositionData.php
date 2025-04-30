<?php

declare(strict_types=1);


namespace Domain\Positions\Data;

use Domain\Positions\Models\Position;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Data\HasDateTransformer;

class PositionData extends Data
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
            "code"        => [
                "nullable", "string",
                Rule::unique(Position::class, 'code')->ignore(request()->route('position'))
            ],
            "label"       => ["required", "string"],
            "description" => ["nullable", "string"],
        ];
    }

    public static function fromModel(Position $position): self
    {
        return new self(
            id: $position ->_id,
            code: $position->code,
            label: $position->label,
            description: $position->description,
            created_at: self::getTransformedLazyDate($position->created_at),
            deleted_at: Lazy::create(static fn () => $position ->deleted_at),
        );
    }

    public static function forForm(Position $position): self
    {
        return new self(
            id: $position ->_id,
            code: $position->code,
            label: $position->label,
            description: $position->description,
        );
    }
}
