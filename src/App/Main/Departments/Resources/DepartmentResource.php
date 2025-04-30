<?php

declare(strict_types=1);


namespace App\Main\Departments\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id"              => $this->_id,
            "code"            => $this->code,
            "label"           => $this->label,
            "description"     => $this->description,
            "department_type" => $this->departmentType->label,
            'created_at'      => $this->whenHas("created_at", ucwords(translate_and_format_date($this->created_at))),
            'deleted_at'      => $this->deleted_at,
        ];
    }
}
