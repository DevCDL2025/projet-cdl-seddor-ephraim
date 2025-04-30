<?php

declare(strict_types=1);


namespace Domain\Doctors\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Support\Models\BaseModel;

class Schedule extends BaseModel
{

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
