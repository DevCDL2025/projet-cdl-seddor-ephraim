<?php

declare(strict_types=1);


namespace Domain\Users\Traits;

use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasUserAccount
{
    public function account(): BelongsTo
    {
        return $this ->belongsTo(User::class, 'user_id');
    }
}
