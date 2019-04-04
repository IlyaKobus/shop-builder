<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 01.04.2019
 * Time: 14:35
 */

namespace App\Modules\Category\Observers;

use App\Modules\Category\Caches\CategoryCache;
use App\Modules\Category\Models\Category;

class CategoryObserver
{
    public function updated(Category $category)
    {
        // TODO it will not catch localable fields changes. find way to fix it if it really needed
        CategoryCache::update();
    }
}
