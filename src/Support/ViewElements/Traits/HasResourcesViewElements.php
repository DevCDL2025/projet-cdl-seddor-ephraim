<?php

declare(strict_types=1);


namespace Support\ViewElements\Traits;

use Domain\Shared\Enums\ResourcesActions;
use Support\ViewElements\ResourcesViewElements;

trait HasResourcesViewElements
{
    protected static function getListViewElements(): ResourcesViewElements|array
    {
        $viewElements = ResourcesViewElements::make(
            title: static::resource() ->locale(2),
            resourcesEnum: static::resource(),
        );

        return $viewElements ->toArray();
    }

    protected static function getCreateViewElements(): ResourcesViewElements|array
    {
        $viewElements = ResourcesViewElements::make(
            title: ResourcesActions::CREATE ->locale() . " " . static::resource() ->locale(2),
            resourcesEnum: static::resource(),
            resourcesActions: ResourcesActions::CREATE,
        );

        return $viewElements ->toArray();
    }

    protected static function getShowViewElements(): ResourcesViewElements|array
    {
        $viewElements = ResourcesViewElements::make(
            title: ResourcesActions::VIEW ->locale() . " " . static::resource() ->locale(2),
            resourcesEnum: static::resource(),
            resourcesActions: ResourcesActions::VIEW,
        );

        return $viewElements ->toArray();
    }

    protected static function getEditViewElements(): ResourcesViewElements|array
    {
        $viewElements = ResourcesViewElements::make(
            title: ResourcesActions::EDIT ->locale() . " " . static::resource() ->locale(2),
            resourcesEnum: static::resource(),
            resourcesActions: ResourcesActions::EDIT,
        );

        return $viewElements ->toArray();
    }
}
