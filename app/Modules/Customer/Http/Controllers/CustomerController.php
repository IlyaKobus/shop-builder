<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 15:06
 */

namespace App\Modules\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Customer\DataTables\CustomerDataTable;
use App\Modules\Customer\Http\Requests\CreateCustomerRequest;
use App\Modules\Customer\Http\Requests\UpdateCustomerRequest;
use App\Modules\Customer\Models\Customer;
use App\Modules\Customer\Models\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Szykra\Notifications\Flash;

class CustomerController extends Controller
{
    /**
     * @param CustomerDataTable $dataTable
     * @return mixed
     */
    public function index(CustomerDataTable $dataTable)
    {
        return $dataTable->render('dashboard.customer.index');
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.customer.edit', compact('customer'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.customer.create');
    }

    /**
     * @param CreateCustomerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCustomerRequest $request)
    {
        Customer::create($request->all())
            ->updateAddresses($request->get('addresses'))
            ->save();

        Flash::success('Customer created');

        return redirect()->route('customers.index');
    }

    /**
     * @param UpdateCustomerRequest $request
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->fill($request->all())
            ->updateAddresses($request->get('addresses'))
            ->save();

        Flash::success('Customer edited');

        return redirect()->route('customers.index');
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        Flash::success('Customer deleted');

        return redirect()->route('customers.index');
    }

    /**
     * @param int $index
     * @return string
     * @throws \Throwable
     */
    public function ajaxAddress(int $index)
    {
        return view('dashboard.customer.address', compact('index'))->render();
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxCustomerById(Customer $customer)
    {
        return response()->json($customer->load('addresses'));
    }

    /**
     * @param CustomerAddress $address
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxCustomerAddressById(CustomerAddress $address)
    {
        return response()->json($address);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxCustomersByName(Request $request)
    {
        $customers = Customer::where('first_name', 'LIKE', "%{$request->get('search')}%")
            ->orWhere('last_name', 'LIKE', "%{$request->get('search')}%")
            ->take(10)
            ->select([DB::raw('CONCAT(last_name, " ", first_name) as text'), 'id'])
            ->get();

        return response()->json([
            'results' => $customers,
        ]);
    }
}
