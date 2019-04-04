<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 07.03.19
 * Time: 13:55
 */

namespace App\Modules\User\Models;

use Illuminate\Support\Facades\Storage;

trait AvatarAttribute
{
    /**
     * @param $value
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getAvatarAttribute($value)
    {
        return $value ? Storage::url($value) : config('dashboard.default_avatar_url');
    }
}
