<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 06.03.19
 * Time: 11:16
 */

namespace App\Modules\User\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\User\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/User/Routes/dashboard.php'));
    }
}
