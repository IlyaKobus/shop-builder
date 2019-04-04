<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 05.03.19
 * Time: 16:56
 */

namespace App\Modules\Dashboard\Auth\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class DashboardRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Modules\Dashboard\Auth\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->prefix('dashboard')
            ->group(base_path('app/Modules/Dashboard/Auth/Routes/dashboard.php'));
    }
}