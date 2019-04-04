<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 29.03.2019
 * Time: 13:04
 */

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\User\DataTables\UserGroupDataTable;
use App\Modules\User\Http\Requests\CreateUserGroupRequest;
use App\Modules\User\Http\Requests\UpdateUserGroupRequest;
use App\Modules\User\Models\UserGroup;
use Szykra\Notifications\Flash;

class UserGroupController extends Controller
{
    /**
     * @param UserGroupDataTable $dataTable
     * @return mixed
     */
    public function index(UserGroupDataTable $dataTable)
    {
        return $dataTable->render('dashboard.user-group.index');
    }

    /**
     * @param UserGroup $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(UserGroup $group)
    {
        return view('dashboard.user-group.edit', compact('group'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.user-group.create');
    }

    /**
     * @param CreateUserGroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserGroupRequest $request)
    {
        UserGroup::create($request->all())
            ->updatePermissions($request->get('permissions'))
            ->save();

        Flash::success('Group created');

        return redirect()->route('user-groups.index');
    }

    /**
     * @param UpdateUserGroupRequest $request
     * @param UserGroup $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserGroupRequest $request, UserGroup $group)
    {
        $group->fill($request->all())
            ->updatePermissions($request->get('permissions'))
            ->save();

        Flash::success('Group edited');

        return redirect()->route('user-groups.index');
    }

    /**
     * @param UserGroup $group
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(UserGroup $group)
    {
        $group->delete();

        Flash::success('Group deleted');

        return redirect()->route('user-groups.index');
    }

    /**
     * @param int $index
     * @return string
     * @throws \Throwable
     */
    public function ajaxPermissionBlock(int $index)
    {
        return view('dashboard.user-group.permission', compact('index'))->render();
    }
}
