<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 06.03.19
 * Time: 17:00
 */

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\DataTables\UserDataTable;
use App\Modules\User\Http\Requests\CreateUserRequest;
use App\Modules\User\Http\Requests\UpdateUserRequest;
use App\Modules\User\Models\User;
use Szykra\Notifications\Flash;

class UserController extends Controller
{
    /**
     * @param UserDataTable $dataTable
     * @return mixed
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('dashboard.user.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        User::create($request->all())
            ->save();

        Flash::success('Group created');

        return redirect()->route('user-groups.index');
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user
            ->fill($request->all())
            ->save();

        Flash::success('User updated.');

        return redirect()->route('users.index');
    }
}
