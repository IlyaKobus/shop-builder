<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 12:49
 */

namespace App\Modules\Extension\Enums;

abstract class ExtensionStatusEnum
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
