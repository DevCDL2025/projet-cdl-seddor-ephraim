<?php

declare(strict_types=1);


namespace Support\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\Support\PathGenerator\PathGeneratorFactory;

class CustomPathGenerator extends PathGeneratorFactory implements PathGenerator
{

    /**
     * @param Media $media
     * @return string
     */
    public function getPath(Media $media): string
    {
        return md5($media->id . config("app.key")) . '/';
    }

    /**
     * @param Media $media
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        return md5($media->id . config("app.key")) . '/conversions/';
    }

    /**
     * @param Media $media
     * @return string
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return md5($media->id . config("app.key")) . '/responsive-images/';
    }
}
