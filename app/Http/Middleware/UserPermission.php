<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 29.03.2019
 * Time: 15:52
 */

namespace App\Http\Middleware;

use App\Modules\User\Enums\GuardedModelsEnum;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserPermission
{
    public function handle($request, Closure $next, $guard = null)
    {
        // TODO too hard. think about refactoring
        $routeMainNamePart = explode('.', Route::currentRouteName())[0];

        if (array_search($routeMainNamePart, GuardedModelsEnum::getNames()) !== false) {
            if ($user = Auth::guard('user')->user()) {
                $routeActionNamePart = explode('.', Route::currentRouteName())[1];
                $permission = $user->group->permissions->where('model', $routeMainNamePart)->first();

                if ($permission) {
                    switch ($routeActionNamePart) {
                        case 'show':
                        case 'index':
                        case 'edit':
                            if ($permission->is_read_permitted) {
                                return $next($request);
                            }
                            break;
                        case 'create':
                        case 'store':
                            if ($permission->is_create_permitted) {
                                return $next($request);
                            }
                            break;
                        case 'update':
                            if ($permission->is_update_permitted) {
                                return $next($request);
                            }
                            break;
                        case 'destroy':
                            if ($permission->is_delete_permitted) {
                                return $next($request);
                            }
                            break;
                    }
                }
            }
            return abort(403);
        }

        return $next($request);
    }
}