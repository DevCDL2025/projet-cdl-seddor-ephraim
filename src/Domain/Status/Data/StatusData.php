<?php

declare(strict_types=1);


namespace Domain\Status\Data;

use Domain\Status\Enums\StatusEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

class StatusData extends Data
{
    public function __construct(
        public string $status,
    )
    {}

    public static function rules(): array
    {
        return [
            'status'        => ['required', Rule::in(StatusEnum::values())],
        ];
    }
}
