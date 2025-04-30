<?php

declare(strict_types=1);


namespace Domain\Positions\Models;

use Domain\Departments\Models\Department;
use Domain\Doctors\Models\Doctor;
use Domain\Staffs\Models\Nurse;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Models\BaseModel;
use Support\Models\Traits\HasCodeAndLabelCaster;

class Position extends BaseModel
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
}
