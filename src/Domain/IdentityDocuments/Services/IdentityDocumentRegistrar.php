<?php

declare(strict_types=1);


namespace Domain\IdentityDocuments\Services;

use Domain\IdentityDocuments\Models\IdentityDocument;
use Illuminate\Support\Facades\Cache;

class IdentityDocumentRegistrar
{
    private static string $identityDocumentsCacheKey = "identity-documents";

    public static function registerIdentityDocuments() : void
    {
        if (Cache::has(self::$identityDocumentsCacheKey)) {
            self::forgetCachedIdentityDocuments();
        }

        self::storeIdentityDocumentsInCache();
    }

    public static function getCachedIdentityDocuments()
    {
        return (Cache::has(self::$identityDocumentsCacheKey))
            ? Cache::get(self::$identityDocumentsCacheKey)
            : self::storeIdentityDocumentsInCache();
    }

    protected static function storeIdentityDocumentsInCache()
    {
        return Cache::rememberForever(self::$identityDocumentsCacheKey, function () {
            return IdentityDocument::all();
        });
    }

    protected static function forgetCachedIdentityDocuments() : void
    {
        Cache::forget(self::$identityDocumentsCacheKey);
    }
}
