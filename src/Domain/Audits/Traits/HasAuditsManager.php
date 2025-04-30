<?php

declare(strict_types=1);


namespace Domain\Audits\Traits;

use Domain\Shared\Enums\ConstantsEnum;
use OwenIt\Auditing\Auditable;

trait HasAuditsManager
{
    use Auditable;

    public function getLatestAuditReport(): \Illuminate\Database\Eloquent\Collection
    {
        return $this ->audits()->latest()->take(ConstantsEnum::NUMBER_OF_LAST_AUDIT_LINE_TO_TAKE ->description())->get();
    }
}
