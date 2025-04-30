<?php

declare(strict_types=1);


namespace App\Main\Doctors\Tables;

use Support\Concerns\StaticallyInstanciable;
use Support\TableBuilder\DataTablesBuilder;

class DoctorsTable extends DataTablesBuilder
{
    use StaticallyInstanciable;

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [];
    }
}
