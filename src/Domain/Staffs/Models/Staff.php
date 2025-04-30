<?php

declare(strict_types=1);


namespace Domain\Staffs\Models;

use Domain\Departments\Models\Department;
use Domain\Doctors\Models\Doctor;
use Domain\Users\Models\User;
use Domain\Users\Traits\HasUserAccount;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends User
{
    use HasUserAccount;

    /**
     * @var string
     */
    protected $table = "staffs";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type', 'hire_date', 'user_id'
    ];

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(
            Department::class,
            'department_staff',
            'staff_id',
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

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class);
    }
}
