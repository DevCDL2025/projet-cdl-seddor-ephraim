<?php

declare(strict_types=1);


namespace Domain\Departments\Models;

use Domain\Specialities\Models\Speciality;
use Domain\Staffs\Models\Staff;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Support\Models\BaseModel;
use Support\Models\Traits\HasCodeAndLabelCaster;

class Department extends BaseModel
{
    use HasCodeAndLabelCaster;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code', 'label', 'description', 'department_type_id',
    ];

    public function departmentType(): BelongsTo
    {
        return $this ->belongsTo(DepartmentType::class, 'department_type_id');
    }

    public function specialities(): BelongsToMany
    {
        return $this->belongsToMany(
            Speciality::class,
            'department_speciality',
            'department_id',
            'speciality_id'
        );
    }

    public function staffs(): BelongsToMany
    {
        return $this->belongsToMany(
            Staff::class,
            'department_staff',
            'department_id',
            'staff_id'
        );
    }
}
