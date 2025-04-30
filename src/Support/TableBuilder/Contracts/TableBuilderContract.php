<?php

declare(strict_types=1);


namespace Support\TableBuilder\Contracts;

interface TableBuilderContract
{
    /**
     * Define table columns.
     *
     * @return array
     */
    public function columns() : array;
}
