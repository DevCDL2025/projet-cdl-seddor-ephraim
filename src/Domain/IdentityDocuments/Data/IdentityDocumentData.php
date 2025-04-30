<?php

declare(strict_types=1);


namespace Domain\IdentityDocuments\Data;

use Domain\IdentityDocuments\Models\IdentityDocument;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;
use Support\Concerns\Data\HasDateTransformer;

class IdentityDocumentData extends Data
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
                Rule::unique(IdentityDocument::class, 'code') ->ignore(request()->route('identityDocument'))
            ],
            "label"         => ["required", "string"],
        ];
    }

    public static function fromModel(IdentityDocument $identityDocument): self
    {
        return new self(
            id: $identityDocument ->_id,
            code: $identityDocument->code,
            label: $identityDocument->label,
            created_at: self::getTransformedLazyDate($identityDocument->created_at),
            deleted_at: Lazy::create(static fn () => $identityDocument ->deleted_at),
        );
    }

    public static function forForm(IdentityDocument $identityDocument): self
    {
        return new self(
            id: $identityDocument ->_id,
            code: $identityDocument->code,
            label: $identityDocument->label,
        );
    }
}
