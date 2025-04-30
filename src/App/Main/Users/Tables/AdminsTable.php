<?php

declare(strict_types=1);


namespace App\Main\Users\Tables;

use Support\Concerns\StaticallyInstanciable;
use Support\TableBuilder\DataTablesBuilder;

class AdminsTable extends DataTablesBuilder
{
    use StaticallyInstanciable;

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            "avatar" => [
                "field" => "avatar",
                "label" => "#",
            ],

            "name" => [
                "field" => "full_name",
                "label" => ucwords(__('validation.attributes.name')),
            ],

            "email" => [
                "field" => "email",
                "label" => ucwords(__('validation.attributes.email')),
            ],

            "role" => [
                "field" => "role",
                "label" => ucwords(trans_choice('displays.resource.role', 1)),
            ],

            "created_at" => [
                "field" => "created_at",
                "label" => ucwords(__('validation.attributes.created_at')),
            ],
        ];
    }
}
