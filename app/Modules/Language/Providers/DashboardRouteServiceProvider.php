<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 18.03.19
 * Time: 16:51
 */

namespace App\Modules\Language\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Language\Http\Controllers';

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/Language/Routes/dashboard.php'));
    }
}
