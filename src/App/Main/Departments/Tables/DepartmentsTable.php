<?php

declare(strict_types=1);


namespace App\Main\Departments\Tables;

use Support\Concerns\StaticallyInstanciable;
use Support\TableBuilder\DataTablesBuilder;

class DepartmentsTable extends DataTablesBuilder
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

            "department_type" => [
                "field" => "department_type",
                "label" => ucwords(trans_choice('displays.resource.department-type', 2)),
            ],

            "count" => [
                "field" => "count",
                "label" => '-',
            ],

            "created_at" => [
                "field" => "created_at",
                "label" => ucwords(__('validation.attributes.created_at')),
            ],
        ];
    }
}
