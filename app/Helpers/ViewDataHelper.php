<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 18:54
 */

namespace App\Helpers;

use App\Modules\Attribute\Models\AttributeGroup;
use App\Modules\Blog\Models\BlogCategory;
use App\Modules\Category\Enums\CategoryStatusEnum;
use App\Modules\Category\Models\Category;
use App\Modules\Currency\Models\Currency;
use App\Modules\Customer\Enums\CustomerStatusEnum;
use App\Modules\Customer\Enums\MailableStatusEnum;
use App\Modules\Customer\Models\CustomerGroup;
use App\Modules\Extension\Enums\ExtensionStatusEnum;
use App\Modules\Extension\Models\Extension;
use App\Modules\Information\Enums\InformationStatusEnum;
use App\Modules\Language\Models\Language;
use App\Modules\Layout\Models\Layout;
use App\Modules\Manufacturer\Models\Manufacturer;
use App\Modules\Option\Models\Option;
use App\Modules\Order\Models\OrderStatus;
use App\Modules\Payment\Enums\PaymentStatusEnum;
use App\Modules\Payment\Models\Payment;
use App\Modules\Product\Enums\ProductStatusEnum;
use App\Modules\Shipment\Enums\ShipmentStatusEnum;
use App\Modules\Shipment\Models\Shipment;
use App\Modules\User\Enums\GuardedModelsEnum;
use App\Modules\User\Enums\ModelActionEnum;
use App\Modules\User\Models\UserGroup;

abstract class ViewDataHelper
{
    /**
     * @return array
     */
    public static function getAttributesSelect()
    {
        $result = [];
        $groups = AttributeGroup::with('attributes')
            ->whereHas('attributes')
            ->get();

        foreach ($groups as $group) {
            $result[$group->name] = $group->attributes->pluck('name', 'id');
        }

        return $result;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getAttributeGroupsSelect()
    {
        return AttributeGroup::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getOptionsSelect()
    {
        return Option::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public static function getCategoriesSelect()
    {
        return Category::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public static function getManufacturersSelect()
    {
        return Manufacturer::all()
            ->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public static function getExtensionsSelect()
    {
        return Extension::all()
            ->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public static function getBlogCategoriesSelect()
    {
        return BlogCategory::withLocales()
            ->get()
            ->pluck('title', 'id');
    }

    /**
     * @return mixed
     */
    public static function getCurrenciesSelect()
    {
        return Currency::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public static function getLayoutsSelect()
    {
        return Layout::all()
            ->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public static function getCustomerGroupSelect()
    {
        return CustomerGroup::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getUserGroupSelect()
    {
        return UserGroup::all()
            ->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public static function getOrderStatusSelect()
    {
        return OrderStatus::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getShipmentsSelect()
    {
        return Shipment::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getPaymentsSelect()
    {
        return Payment::withLocales()
            ->get()
            ->pluck('name', 'id');
    }

    /**
     * @return array
     */
    public static function getModulesSelect()
    {
        $result = [];
        $extensions = Extension::with('modules')
            ->whereHas('modules')
            ->get();

        foreach ($extensions as $extension) {
            $result[$extension->name] = $extension->modules->pluck('name', 'id');
        }

        return $result;
    }

    /**
     * @return array
     */
    public static function getCategoryStatuses()
    {
        return array_combine(CategoryStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, CategoryStatusEnum::toArray()));
    }

    /**
     * @return array
     */
    public static function getInformationStatuses()
    {
        return array_combine(InformationStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, InformationStatusEnum::toArray()));
    }

    /**
     * @return array
     */
    public static function getExtensionStatuses()
    {
        return array_combine(ExtensionStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, InformationStatusEnum::toArray()));
    }

    /**
     * @return array|false
     */
    public static function getMailableStatuses()
    {
        return array_combine(MailableStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, MailableStatusEnum::toArray()));
    }

    /**
     * @return array|false
     */
    public static function getCustomerStatuses()
    {
        return array_combine(CustomerStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, CustomerStatusEnum::toArray()));
    }

    /**
     * @return array|false
     */
    public static function getPaymentStatuses()
    {
        return array_combine(PaymentStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, PaymentStatusEnum::toArray()));
    }

    /**
     * @return array|false
     */
    public static function getShipmentStatuses()
    {
        return array_combine(ShipmentStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, ShipmentStatusEnum::toArray()));
    }

    /**
     * @return array|false
     */
    public static function getProductStatuses()
    {
        return array_combine(ProductStatusEnum::toArray(), array_map(function ($item) {
            return ucfirst($item);
        }, ProductStatusEnum::toArray()));
    }

    /**
     * @return array|false
     */
    public static function getModelPermissions()
    {
        return array_combine(GuardedModelsEnum::getNames(), array_map(function ($item) {
            return ucfirst($item);
        }, GuardedModelsEnum::getNames()));
    }

    /**
     * @return array|false
     */
    public static function getModelPermissionActions()
    {
        return ModelActionEnum::toArray();
    }

    /**
     * @param string|null $value
     * @param string|null $key
     * @return \Illuminate\Support\Collection
     */
    public static function getLanguages(?string $value = null, ?string $key = null)
    {
        $languages = Language::all();

        if (!is_null($value)) {
            return $languages->pluck($value, $key);
        }

        return $languages;
    }
}
