<?php

declare(strict_types=1);


namespace Support\Services\MediaLibrary\Enums;

enum MediaCollectionEnum: string
{
    case PHYSICAL_PERSON_IDENTITY_DOCUMENT = "identity-document";
    case PACKAGE_IMAGE = "package-image";
}
