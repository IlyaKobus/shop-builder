<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 01.04.2019
 * Time: 14:35
 */

namespace App\Modules\Category\Providers;

use App\Modules\Category\Models\Category;
use App\Modules\Category\Observers\CategoryObserver;
use Illuminate\Support\ServiceProvider;

class CategoryObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
    }
}
