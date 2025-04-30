<?php

declare(strict_types=1);


namespace App\Main\Permissions\Tables;

use Support\Concerns\StaticallyInstanciable;
use Support\TableBuilder\DataTablesBuilder;

class PermissionsTable extends DataTablesBuilder
{
    use StaticallyInstanciable;

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            "name" => [
                "field" => "name",
                "label" => ucwords(__('validation.attributes.name')),
            ],

            "label" => [
                "field" => "label",
                "label" => ucwords(__('validation.attributes.label')),
            ],

            "created_at" => [
                "field" => "created_at",
                "label" => ucwords(__('validation.attributes.created_at')),
            ],
        ];
    }
}
