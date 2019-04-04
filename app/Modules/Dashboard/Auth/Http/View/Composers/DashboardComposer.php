<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 07.03.19
 * Time: 13:50
 */

namespace App\Modules\Dashboard\Auth\Http\View\Composers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardComposer
{
    /**
     * @var Authenticatable
     */
    protected $user;

    /**
     * DashboardComposer constructor.
     */
    public function __construct()
    {
        $this->user = Auth::guard('user')->user();
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', $this->user);
    }
}
