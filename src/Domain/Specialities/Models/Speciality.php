<?php

declare(strict_types=1);


namespace Domain\Specialities\Models;

use Domain\Departments\Models\Department;
use Domain\Doctors\Models\Doctor;
use Domain\Staffs\Models\Nurse;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Models\BaseModel;
use Support\Models\Traits\HasCodeAndLabelCaster;

class Speciality extends BaseModel
{
    use HasCodeAndLabelCaster;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code', 'label', 'description',
    ];

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(
            Department::class,
            'department_speciality',
            'speciality_id',
            'department_id'
        );
    }

    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }

    public function nurses(): HasMany
    {
        return $this->hasMany(Nurse::class);
    }
}
