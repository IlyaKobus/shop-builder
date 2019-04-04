<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 13:22
 */

namespace App\Modules\Product\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Product\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/Product/Routes/dashboard.php'));
    }
}
