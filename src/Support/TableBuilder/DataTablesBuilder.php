<?php

declare(strict_types=1);


namespace Support\TableBuilder;

use Spatie\ViewModels\ViewModel;
use Support\TableBuilder\Contracts\TableBuilderContract;

abstract class DataTablesBuilder extends ViewModel implements Contracts\TableBuilderContract
{
    public function __construct(
        public mixed $rows,
    )
    {}

    public function toArray() : array
    {
        return [
            'columns'   => $this->columns(),
            'rows'      => $this->rows,
        ];
    }
}
