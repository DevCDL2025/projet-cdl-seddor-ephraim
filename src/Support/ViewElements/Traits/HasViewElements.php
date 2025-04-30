<?php

declare(strict_types=1);


namespace Support\ViewElements\Traits;

use Diglactic\Breadcrumbs\Breadcrumbs;
use Support\ViewElements\ViewElements;

trait HasViewElements
{
    protected static function getViewElementsFor(string $page, string $breadcrumbs = null): ViewElements
    {
        return new ViewElements(
            title: __('concerns.'.strtolower($page).'.page.title'),
            breadCrumbs: $breadcrumbs !== null ? self::getBreadcrumbs($breadcrumbs) : null,
        );
    }

    protected static function getViewElements(string $pageTitle, string $breadcrumbs = null): ViewElements
    {
        return new ViewElements(
            title: $pageTitle,
            breadCrumbs: $breadcrumbs !== null ? self::getBreadcrumbs($breadcrumbs) : null,
        );
    }

    protected static function getBreadcrumbs(string $breadcrumbs)
    {
        return Breadcrumbs::render($breadcrumbs) ->getData()['breadcrumbs'] ->toArray();
    }
}
