<?php

declare(strict_types=1);


namespace Domain\Permissions\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Support\Models\Traits\HasModelUtils;
use Support\Models\Traits\HasUuidUtils;

class Role extends SpatieRole
{
    use HasModelUtils, HasUuidUtils;
}
