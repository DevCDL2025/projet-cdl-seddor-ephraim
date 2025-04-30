<?php

declare(strict_types=1);


namespace Domain\Staffs\Models;

use Domain\Specialities\Models\Speciality;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Support\Models\BaseModel;

class Nurse extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'staff_id', 'speciality_id',
    ];

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function speciality(): BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }
}
