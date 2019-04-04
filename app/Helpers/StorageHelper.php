<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 07.03.19
 * Time: 14:03
 */

namespace App\Helpers;

use App\Enums\FilePathEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

abstract class StorageHelper
{
    /**
     * @param string $fileName
     * @param UploadedFile $file
     * @param Model|null $model
     * @param string|null $path
     * @return string|null
     */
    public static function updateFile(
        string $fileName,
        UploadedFile $file,
        ?Model $model = null,
        ?string $path = null
    ): ?string
    {
        $storagePath = '/';

        if ($path) {
            if (in_array($path, FilePathEnum::toArray())) {
                $storagePath = FilePathEnum::getNameToPathArray()[$path];
            } else {
                $storagePath = $path;
            }
        }

        $result = Storage::url($file->store($storagePath));

        if ($model) {
            if (Schema::hasColumn($model->getTable(), Str::snake($fileName))) {
                self::removeByUrl($model[$fileName]);

                $model[$fileName] = $result;
            }
        }

        return $result;
    }

    /**
     * Remove file from storage by full URL
     *
     * @param string|null $url
     * @return bool
     */
    public static function removeByUrl(?string $url): bool
    {
        if (!$url) {
            return false;
        }

        $oldFilePath = substr($url, strlen(Storage::url('/')));
        return Storage::delete($oldFilePath);
    }
}
