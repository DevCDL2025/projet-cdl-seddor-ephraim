<?php

declare(strict_types=1);


namespace Domain\Departments\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Models\BaseModel;
use Support\Models\Traits\HasCodeAndLabelCaster;

class DepartmentType extends BaseModel
{
    use HasCodeAndLabelCaster;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'code', 'label',];

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
