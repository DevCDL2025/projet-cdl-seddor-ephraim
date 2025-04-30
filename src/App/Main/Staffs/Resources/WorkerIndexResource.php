<?php

declare(strict_types=1);


namespace App\Main\Staffs\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkerIndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id"           => $this->_id,
            "avatar"       => generate_avatar_from($this->last_name . " " . $this->first_name),
            "full_name"    => $this->last_name . " " . $this->first_name,
            "email"        => $this->email,
            "phone_number" => $this->phone_number,
            "position"     => $this->position_label,
            'created_at'   => $this->whenHas("created_at", ucwords(translate_and_format_date($this->created_at))),
            'deleted_at'   => $this->deleted_at,
        ];
    }
}
