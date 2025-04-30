<?php

declare(strict_types=1);


namespace Domain\Shared\Macros;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class MacroSearch
{
    public static function build(): void
    {
        Builder::macro('search', function ($attributes, string|array|null $searchTerm) {
            if ($searchTerm === null) {
                return $this;
            }

            $this ->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    if (is_array($searchTerm)) {
                        foreach ($searchTerm as $term) {
                            $query->orWhere($attribute, 'LIKE', "%{$term}%");
                        }
                    }

                    else {
                        $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                    }
                }
            });

            return $this;
        });
    }
}
