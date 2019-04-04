<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 29.03.2019
 * Time: 13:22
 */

namespace App\Modules\User\Enums;

use App\Modules\Attribute\Models\Attribute;
use App\Modules\Attribute\Models\AttributeGroup;
use App\Modules\Blog\Models\BlogCategory;
use App\Modules\Blog\Models\BlogPost;
use App\Modules\Category\Models\Category;
use App\Modules\Currency\Models\Currency;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Models\CustomerGroup;
use App\Modules\Extension\Models\Extension;
use App\Modules\Extension\Models\Module;
use App\Modules\Information\Models\Information;
use App\Modules\Language\Models\Language;
use App\Modules\Layout\Models\Layout;
use App\Modules\Manufacturer\Models\Manufacturer;
use App\Modules\Option\Models\Option;
use App\Modules\Order\Models\Order;
use App\Modules\Order\Models\OrderStatus;
use App\Modules\Payment\Models\Payment;
use App\Modules\Product\Models\Product;
use App\Modules\Shipment\Models\Shipment;
use App\Modules\User\Models\User;
use App\Modules\User\Models\UserGroup;

abstract class GuardedModelsEnum
{
    const MODELS = [
        User::class => 'users',
        UserGroup::class => 'user-groups',

        Customer::class => 'customers',
        CustomerGroup::class => 'customer-groups',

        Extension::class => 'extensions',
        Module::class => 'modules',

        Layout::class => 'layouts',

        Category::class => 'categories',

        Product::class => 'products',

        Attribute::class => 'attributes',
        AttributeGroup::class => 'attribute-groups',

        Option::class => 'options',

        Language::class => 'languages',

        Manufacturer::class => 'manufacturers',

        Information::class => 'informations',

        BlogPost::class => 'blog-posts',
        BlogCategory::class => 'blog-categories',

        Currency::class => 'currencies',

        Order::class => 'orders',
        OrderStatus::class => 'order-statuses',
        Shipment::class => 'shipments',
        Payment::class => 'paymnets',
    ];

    public static function getNames()
    {
        return array_values(self::MODELS);
    }
}
