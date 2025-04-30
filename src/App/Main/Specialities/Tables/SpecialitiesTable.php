<?php

declare(strict_types=1);


namespace App\Main\Specialities\Tables;

use Support\Concerns\StaticallyInstanciable;
use Support\TableBuilder\DataTablesBuilder;

class SpecialitiesTable extends DataTablesBuilder
{
    use StaticallyInstanciable;

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            "code" => [
                "field" => "code",
                "label" => ucwords(__('validation.attributes.code')),
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
