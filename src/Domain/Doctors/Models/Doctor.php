<?php

declare(strict_types=1);


namespace Domain\Doctors\Models;

use Domain\Specialities\Models\Speciality;
use Domain\Staffs\Models\Staff;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Models\BaseModel;

class Doctor extends BaseModel
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

    public function schedules(): HasMany
    {
        return $this ->hasMany(Schedule::class);
    }
}
