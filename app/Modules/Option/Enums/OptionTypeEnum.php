<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 12:02
 */

namespace App\Modules\Option\Enums;

abstract class OptionTypeEnum
{
    const SELECT = 'select';
    const RADIO = 'radio';
    const CHECKBOX = 'checkbox';

    const TEXT = 'text';
    const TEXTAREA = 'textarea';

    /**
     * @return array
     */
    public static function getVariabled()
    {
        return [
            self::CHECKBOX,
            self::RADIO,
            self::SELECT,
        ];
    }

    /**
     * @return array
     */
    public static function toArray()
    {
        return [
            self::CHECKBOX,
            self::RADIO,
            self::SELECT,
            self::TEXT,
            self::TEXTAREA,
        ];
    }
}
