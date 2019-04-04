<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 05.03.19
 * Time: 17:12
 */

namespace App\Modules\Dashboard\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function home()
    {
        return redirect()->route('users.index');
    }
}