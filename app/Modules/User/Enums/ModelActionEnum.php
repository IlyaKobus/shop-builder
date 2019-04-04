<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 29.03.2019
 * Time: 13:44
 */

namespace App\Modules\User\Enums;

abstract class ModelActionEnum
{
    const READ = 'read';
    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';

    public static function toArray()
    {
        return [
            self::READ,
            self::UPDATE,
            self::CREATE,
            self::DELETE,
        ];
    }
}
