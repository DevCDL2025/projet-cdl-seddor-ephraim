<?php

declare(strict_types=1);


namespace Domain\Shared\Enums;

use Support\Concerns\Enums\EnumEnhancements;
use Support\Contracts\EnumsDefinition;

enum ResourcesActions: string implements EnumsDefinition
{
    use EnumEnhancements;

    case CREATE       = "create";
    case VIEW         = "view";
    case EDIT         = "edit";
    case DELETE       = "delete";
    case RESTORE      = "restore";
    case FORCE_DELETE = "force-delete";


    public function label(): string
    {
        return __('usuals.resource_action.' . $this ->value . '.label');
    }

    public function description(): string
    {
        return __('usuals.resource_action.' . $this ->value . '.description');
    }

    public function locale(): string
    {
        return __('actions.' . $this ->value);
    }
}
