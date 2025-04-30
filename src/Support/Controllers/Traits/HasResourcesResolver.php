<?php

declare(strict_types=1);


namespace Support\Controllers\Traits;

use Domain\Shared\Enums\ResourcesEnum;

trait HasResourcesResolver
{
    protected static ResourcesEnum $resourcesEnum;

    /**
     * Give the resource's name.
     *
     * @return ResourcesEnum
     */
    abstract protected static function resource(): ResourcesEnum;

    public function getResourceEnum() : ResourcesEnum
    {
        return self::$resourcesEnum;
    }
}
