<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 05.03.19
 * Time: 17:41
 */

namespace App\Modules\Dashboard\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as IAuthenticatable;
use Illuminate\Database\Eloquent\Model;

abstract class DashboardAuthenticatableAbstract extends Model implements IAuthenticatable
{
    use Authenticatable;
}