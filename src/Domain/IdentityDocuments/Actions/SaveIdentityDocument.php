<?php

declare(strict_types=1);


namespace Domain\IdentityDocuments\Actions;

use Domain\IdentityDocuments\Data\IdentityDocumentData;
use Domain\IdentityDocuments\Models\IdentityDocument;

class SaveIdentityDocument
{
    public static function execute(IdentityDocumentData $data, IdentityDocument $identityDocument = null) : void
    {
        $identityDocument = $identityDocument ?? new IdentityDocument();

        $identityDocument->fill([
            "code"  => $data->code,
            "label" => $data->label,
        ]) ->save();
    }
}
