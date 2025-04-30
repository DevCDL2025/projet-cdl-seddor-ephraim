<?php

declare(strict_types=1);


namespace Support\Controllers\Traits;

trait HasModelResolver
{
    protected $model;

    /**
     * Get the resource model
     *
     * @return string|null
     */
    abstract protected function model(): ?string;

    protected function getModel()
    {
        return $this ->model;
    }
}
