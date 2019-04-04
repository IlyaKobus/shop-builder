<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 05.03.19
 * Time: 17:23
 */

namespace App\Modules\Dashboard\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Dashboard\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/Dashboard/Routes/dashboard.php'));
    }
}