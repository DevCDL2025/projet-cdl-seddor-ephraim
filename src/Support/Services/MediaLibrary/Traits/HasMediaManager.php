<?php

declare(strict_types=1);


namespace Support\Services\MediaLibrary\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Domain\Shared\Enums\ConstantsEnum;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait HasMediaManager
{
    public static function processMedia($model, string $mediaCollection, array $media): void
    {
        foreach ($media as $key => $value) {
            $model -> addMedia($value)
                ->toMediaCollection($mediaCollection);

            Storage::disk("local")->delete($key);
        }
    }

    public static function processMediaFromUrl($model, string $mediaCollection, string $url): void
    {
        $model ->addMediaFromUrl($url)
            ->toMediaCollection($mediaCollection);
    }

    public static function removeMedia($id): void
    {
        $media = Media::where("uuid", $id)->first();
        $mediaPath = explode(ConstantsEnum::MEDIA_STORAGE_PATH ->description(), $media->getPath());
        $mediaFolder = explode("/", $mediaPath[1]);

        File::deleteDirectory(storage_path('app/public/media'. $mediaFolder[0]));

        $media->delete();
    }
}
