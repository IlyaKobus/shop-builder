<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 16:24
 */

namespace App\Modules\Layout\Enums;

abstract class ContentTypeEnum
{
    const LEFT = 'left';
    const RIGHT = 'right';
    const TOP = 'top';
    const BOTTOM = 'bottom';

    /**
     * @return array
     */
    public static function toArray()
    {
        return [
            self::BOTTOM,
            self::LEFT,
            self::RIGHT,
            self::TOP,
        ];
    }
}
