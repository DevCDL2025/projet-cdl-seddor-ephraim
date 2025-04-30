<?php

declare(strict_types=1);


namespace App\Main\Specialities\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialitiesForDepartmentFormResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id"          => $this->id,
            "label"       => $this->label,
        ];
    }
}
