<?php

declare(strict_types=1);


namespace Domain\IdentityDocuments\Models;

use Domain\IdentityDocuments\Observers\IdentityDocumentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Support\Models\BaseModel;

#[ObservedBy([IdentityDocumentObserver::class])]
class IdentityDocument extends BaseModel
{
    protected $table = 'identity_documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code', 'label', 'description',
    ];

    protected function code(): Attribute
    {
        return Attribute::make(
            set: static fn ($value) => strtoupper($value)
        );
    }

    protected function label(): Attribute
    {
        return Attribute::make(
            set: static fn ($value) => ucfirst($value)
        );
    }
}
