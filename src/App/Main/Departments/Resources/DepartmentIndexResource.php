<?php

declare(strict_types=1);


namespace App\Main\Departments\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class DepartmentIndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id"              => $this->_id,
            "code"            => $this->department_code,
            "label"           => Str::limit($this->department_label, 15),
            "department_type" => $this->department_type_label,
            "count"           => [
                "specialities" => $this->specialities_count,
                "staffs"       => $this->staffs_count,
            ],
            'created_at'      => $this->whenHas("created_at", ucwords(translate_and_format_date($this->created_at))),
            'deleted_at'      => $this->deleted_at,
        ];
    }
}
