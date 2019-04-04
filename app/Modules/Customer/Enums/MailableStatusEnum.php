<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 16:11
 */

namespace App\Modules\Customer\Enums;

abstract class MailableStatusEnum
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