<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 07.03.19
 * Time: 14:04
 */

namespace App\Enums;

abstract class FilePathEnum
{
    const AVATAR_ADMIN = 'admin_images';
    const AVATAR_MANAGER = 'manager_images';
    const AVATAR_CUSTOMER = 'customer_images';

    const ICON_CATEGORY = 'category_icon';
    const ICON_MANUFACTURER = 'manufacturer_icon';
    const ICON_OPTION_VALUE = 'option_value_icon';

    const IMAGE_PRODUCT = 'product_image';

    /**
     * @return array
     */
    public static function toArray()
    {
        return [
            self::AVATAR_ADMIN,
            self::AVATAR_MANAGER,
            self::AVATAR_CUSTOMER,
            self::ICON_MANUFACTURER,
            self::ICON_OPTION_VALUE,
            self::ICON_CATEGORY,
            self::IMAGE_PRODUCT,

        ];
    }

    public static function getNameToPathArray()
    {
        return [
            self::AVATAR_ADMIN => config('filesystems.path.admin.avatar'),
            self::AVATAR_MANAGER => config('filesystems.path.manager.avatar'),
            self::AVATAR_CUSTOMER => config('filesystems.path.customer.avatar'),

            self::IMAGE_PRODUCT => config('filesystems.path.product.image'),

            self::ICON_CATEGORY => config('filesystems.path.category.icon'),
            self::ICON_MANUFACTURER => config('filesystems.path.manufacturer.icon'),
            self::ICON_OPTION_VALUE => config('filesystems.path.option.value.icon'),
        ];
    }
}
