<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 13.03.19
 * Time: 12:42
 */

namespace App\Modules\Option\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Option\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/Option/Routes/dashboard.php'));
    }
}
