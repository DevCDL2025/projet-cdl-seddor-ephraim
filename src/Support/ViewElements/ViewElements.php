<?php

declare(strict_types=1);


namespace Support\ViewElements;

use Spatie\ViewModels\ViewModel;

class ViewElements extends ViewModel
{
    public function __construct(
        public string  $title,
        public ?string $description = null,
        public ?array  $breadCrumbs = [],
    )
    {
        $this ->description = $description ?: $title;
    }
}
