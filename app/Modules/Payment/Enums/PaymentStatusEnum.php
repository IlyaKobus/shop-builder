<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:02
 */

namespace App\Modules\Payment\Enums;

abstract class PaymentStatusEnum
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
