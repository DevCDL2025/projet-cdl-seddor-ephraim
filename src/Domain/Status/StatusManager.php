<?php

declare(strict_types=1);


namespace Domain\Status;

class StatusManager
{
    public static function resolveStatusForResources($statusEnum): array
    {
        return [
            "value"         => $statusEnum ->value,
            "label"         => $statusEnum ->label(),
            "description"   => $statusEnum ->description(),
            "color"         => $statusEnum ->color(),
        ];
    }

    public static function resolveStatusFrom($status): array
    {
        $data = $status;

        return [
            "value"         => $data ->value,
            'label'         => $data ->label(),
            'description'   => $data ->description(),
            'color'         => $data ->color(),
        ];
    }
}
