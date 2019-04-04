<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 01.04.2019
 * Time: 14:36
 */

namespace App\Modules\Category\Caches;

use App\Modules\Category\Models\Category;
use Illuminate\Support\Facades\Cache;

abstract class CategoryCache
{
    const CACHE_LIFETIME = 24 * 3600; // 24 hrs

    /**
     * @return \Illuminate\Database\Eloquent\Collection|mixed
     */
    public static function get()
    {
        if (Cache::has('categories')) {
            $categories = Cache::get('categories');
        } else {
            $categories = self::update();
        }

        return $categories;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function update()
    {
        $categories = Category::buildTree(Category::with('locales')->get());
        Cache::put('categories', $categories, self::CACHE_LIFETIME);

        return $categories;
    }
}
