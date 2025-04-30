<?php

declare(strict_types=1);


namespace Domain\Audits\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return filtered_array([
            "id"         => $this->id,
            "event"      => [
                'name'   => $this->event,
                "locale" => __('usuals.event.' . $this->event)
            ],
            'created_at' => ucwords(translate_and_format_date($this->created_at)),
            "user"       => (!empty($this->user)) ? [
                "id"   => $this->user->_id,
                "name" => $this->user->account->first_name,
            ] : null,
        ]);
    }
}
