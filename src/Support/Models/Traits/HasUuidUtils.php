<?php

declare(strict_types=1);


namespace Support\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

trait HasUuidUtils
{
    use HasUuids;

    /**
     * Get the columns that should receive a unique identifier.
     *
     * @return array<int, string>
     */
    public function uniqueIds(): array
    {
        return ['_id'];
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return '_id';
    }

    public function scopefindByUuid(Builder $query, string $id): ?Model
    {
        return $query ->where('_id', $id) ->first();
    }

    public function scopeWhereUuid(Builder $query, string $id): Builder
    {
        return $query ->where('_id', $id);
    }
}
