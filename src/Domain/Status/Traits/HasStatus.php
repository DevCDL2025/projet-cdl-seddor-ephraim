<?php

declare(strict_types=1);


namespace Domain\Status\Traits;

use Domain\Status\Enums\StatusEnum;

trait HasStatus
{
    /**
     * Get the status attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected static function statusCasts(): array
    {
        return [
            'status' => StatusEnum::class,
        ];
    }

    /**
     * Scope status attribute.
     *
     * @param $query
     * @param $status
     *
     * @return void
     */
    public function scopeWhereStatus($query, $status): void
    {
        $query->where('status', '=', $status);
    }
}
