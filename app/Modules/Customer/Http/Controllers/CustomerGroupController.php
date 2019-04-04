<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 15:06
 */

namespace App\Modules\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Customer\DataTables\CustomerGroupDataTable;
use App\Modules\Customer\Http\Requests\CreateCustomerGroupRequest;
use App\Modules\Customer\Http\Requests\UpdateCustomerGroupRequest;
use App\Modules\Customer\Models\CustomerGroup;
use Szykra\Notifications\Flash;

class CustomerGroupController extends Controller
{
    /**
     * @param CustomerGroupDataTable $dataTable
     * @return mixed
     */
    public function index(CustomerGroupDataTable $dataTable)
    {
        return $dataTable->render('dashboard.customer-group.index');
    }

    /**
     * @param CustomerGroup $group
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CustomerGroup $group)
    {
        return view('dashboard.customer-group.edit', compact('group'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.customer-group.create');
    }

    /**
     * @param CreateCustomerGroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCustomerGroupRequest $request)
    {
        CustomerGroup::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Customer Group created');

        return redirect()->route('customer-groups.index');
    }

    /**
     * @param UpdateCustomerGroupRequest $request
     * @param CustomerGroup $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCustomerGroupRequest $request, CustomerGroup $group)
    {
        $group->fill($request->all())
            ->updateLocales($request->all())
            ->save();

        Flash::success('Customer Group edited');

        return redirect()->route('customer-groups.index');
    }

    /**
     * @param CustomerGroup $group
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(CustomerGroup $group)
    {
        $group->delete();

        Flash::success('Customer Group deleted');

        return redirect()->route('customer-groups.index');
    }
}
