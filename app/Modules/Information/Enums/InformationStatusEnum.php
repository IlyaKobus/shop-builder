<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 11:58
 */

namespace App\Modules\Information\Enums;

abstract class InformationStatusEnum
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
