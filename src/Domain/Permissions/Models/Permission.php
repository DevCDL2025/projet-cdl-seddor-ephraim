<?php

declare(strict_types=1);


namespace Domain\Permissions\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Support\Models\Traits\HasModelUtils;
use Support\Models\Traits\HasUuidUtils;

class Permission extends SpatiePermission
{
    use HasModelUtils, HasUuidUtils;
}
