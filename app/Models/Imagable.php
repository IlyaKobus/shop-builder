<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 13:52
 */

namespace App\Models;

use App\Helpers\StorageHelper;
use Illuminate\Http\UploadedFile;

trait Imagable
{
    /**
     * @param UploadedFile|null $image
     * @return Imagable
     */
    public function updateImage(?UploadedFile $image): self
    {
        if ($image) {
            StorageHelper::updateFile('image', $image, $this, $this->image_path);
        }

        return $this;
    }

    /**
     * @param $value
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getImageAttribute($value)
    {
        return $value ?? config('dashboard.default_image_url');
    }
}
