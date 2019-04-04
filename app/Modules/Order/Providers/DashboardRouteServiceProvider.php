<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:29
 */

namespace App\Modules\Order\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Order\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/Order/Routes/dashboard.php'));
    }
}
