<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 15:35
 */

namespace App\Modules\Customer\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Customer\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/Customer/Routes/dashboard.php'));
    }
}
