<?php

declare(strict_types=1);


namespace Support\ViewElements;

use Domain\Shared\Enums\ResourcesActions;
use Domain\Shared\Enums\ResourcesEnum;
use Spatie\ViewModels\ViewModel;
use Support\Concerns\StaticallyInstanciable;

class ResourcesViewElements extends ViewModel
{
    use StaticallyInstanciable;

    public function __construct(
        public string            $title,
        public ?string           $description = null,
        public ?array            $breadCrumbs = [],
        public ?ResourcesEnum    $resourcesEnum = null,
        public ?ResourcesActions $resourcesActions = null,
    )
    {
        $this ->description = $description ?: $title;
    }

    /**
     * @return array|null
     */
    public function resource(): ?array
    {
        return !is_null($this ->resourcesEnum) ? [
            "name"        => $this->resourcesEnum->value,
            "plural_name" => $this->resourcesEnum->plural(),
            "locale"      => [
                "name"        => $this->resourcesEnum->locale(),
                "plural_name" => $this->resourcesEnum->locale(2),
            ]
        ] : null;
    }

    public function toArray() : array
    {
        return [
            "title"       => $this->title,
            "description" => $this->description,
            "resource"    => $this->resource(),
            "action"      => $this->resourcesActions !== null ? [
                "name"   => $this->resourcesActions->value,
                "locale" => $this->resourcesActions->locale(),
            ] : null,
        ];
    }
}
