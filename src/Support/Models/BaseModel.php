<?php

declare(strict_types=1);


namespace Support\Models;

use Domain\Audits\Traits\HasAuditsManager;
use Domain\Status\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Support\Models\Traits\HasModelUtils;
use Support\Models\Traits\HasUuidUtils;

abstract class BaseModel extends Model implements Auditable
{
    use HasModelUtils,
        HasUuidUtils,
        HasAuditsManager,
        HasStatus;
}
