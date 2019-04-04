<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 17:56
 */

namespace App\Modules\Product\Enums;

abstract class ProductStatusEnum
{
    const ENABLED = 'enabled';
    const DISABLED = 'disabled';

    /**
     * @return array
     */
    public static function toArray()
    {
        return [
            self::ENABLED,
            self::DISABLED,
        ];
    }
}
