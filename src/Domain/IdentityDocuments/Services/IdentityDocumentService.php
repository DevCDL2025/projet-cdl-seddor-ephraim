<?php

declare(strict_types=1);


namespace Domain\IdentityDocuments\Services;

class IdentityDocumentService
{
    public static function getIdentityDocumentsLabelsAndIds()
    {
        return DepartmentRegistrar::getCachedIdentityDocuments() ->map(function ($identityDocument) {
            return [
                "id"    => $identityDocument->id,
                "label" => $identityDocument->label,
            ];
        });
    }

    public static function getIdentityDocumentsLabelsAndCodes()
    {
        return DepartmentRegistrar::getCachedIdentityDocuments() ->map(function ($identityDocument) {
            return [
                "id"    => $identityDocument->id,
                "code"  => $identityDocument->code,
                "label" => $identityDocument->label,
            ];
        });
    }
}
