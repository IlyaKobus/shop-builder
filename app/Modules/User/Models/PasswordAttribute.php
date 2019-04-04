<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 06.03.19
 * Time: 11:09
 */

namespace App\Modules\User\Models;

use Illuminate\Support\Facades\Hash;

trait PasswordAttribute
{
    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}