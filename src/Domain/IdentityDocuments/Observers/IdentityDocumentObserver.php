<?php

declare(strict_types=1);


namespace Domain\IdentityDocuments\Observers;

use Domain\IdentityDocuments\Models\IdentityDocument;
use Domain\IdentityDocuments\Services\IdentityDocumentRegistrar;

class IdentityDocumentObserver
{
    /**
     * Handle the IdentityDocument "created" event.
     */
    public function created(IdentityDocument $identityDocument): void
    {
        IdentityDocumentRegistrar::registerIdentityDocuments();
    }

    /**
     * Handle the IdentityDocument "updated" event.
     */
    public function updated(IdentityDocument $identityDocument): void
    {
        IdentityDocumentRegistrar::registerIdentityDocuments();
    }

    /**
     * Handle the IdentityDocument "deleted" event.
     */
    public function deleted(IdentityDocument $identityDocument): void
    {
        IdentityDocumentRegistrar::registerIdentityDocuments();
    }

    /**
     * Handle the IdentityDocument "restored" event.
     */
    public function restored(IdentityDocument $identityDocument): void
    {
        IdentityDocumentRegistrar::registerIdentityDocuments();
    }

    /**
     * Handle the IdentityDocument "forceDeleted" event.
     */
    public function forceDeleted(IdentityDocument $identityDocument): void
    {
        //IdentityDocumentRegistrar::registerIdentityDocuments();
    }
}
