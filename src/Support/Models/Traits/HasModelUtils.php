<?php

declare(strict_types=1);


namespace Support\Models\Traits;

use Carbon\Carbon;
use Domain\Shared\Enums\ConstantsEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;

trait HasModelUtils
{
    use SoftDeletes;

    public function scopeOrderAndPaginate(Builder $query, $per_page = null, $direction = "desc"): LengthAwarePaginator
    {
        $row_per_page = $per_page ?? ConstantsEnum::PAGINATE_PER_PAGE ->description();

        return $query ->orderBy('created_at', $direction) ->paginate($row_per_page);
    }

    public function formattedCreatedAt(): Attribute
    {
        Carbon::setlocale("fr");

        return Attribute::make(
            get: static fn ($value, $attributes) => Carbon::parse($attributes['created_at'])->translatedFormat('j M Y à H:i d'),
        );
    }

    public function formattedUpdatedAt(): Attribute
    {
        Carbon::setlocale("fr");

        return Attribute::make(
            get: static fn ($value, $attributes) => Carbon::parse($attributes['updated_at'])->translatedFormat('j M Y à H:i d'),
        );
    }

    public function scopeIgnoreId($query, $id): void
    {
        $query->where('id', '<>', $id) ->orwhereNotIn('_id', (array) $id);
    }
}
