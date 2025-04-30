<?php

declare(strict_types=1);


namespace Domain\Staffs\Models;

use Domain\Positions\Models\Position;
use Domain\Specialities\Models\Speciality;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Support\Models\BaseModel;

class Worker extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id', 'position_id',
    ];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }
}
