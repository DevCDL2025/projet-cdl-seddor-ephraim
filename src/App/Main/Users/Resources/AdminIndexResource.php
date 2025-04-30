<?php

declare(strict_types=1);


namespace App\Main\Users\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminIndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return filtered_array([
            "id"                => $this ->_id,
            "avatar"            => generate_avatar_from($this ->full_name),
            "full_name"         => $this ->full_name,
            "email"             => $this ->email,
            "role"              => [
                "id"            => $this ->role_id,
                "label"         => $this ->role_label,
            ],
            "agency"              => [
                "id"            => $this ->agency_id,
                "label"         => $this ->agency_label,
            ],
            'created_at'        => $this ->whenHas("created_at", ucwords(translate_and_format_date($this ->created_at))),
            'deleted_at'        => $this ->deleted_at,
        ]);
    }
}
