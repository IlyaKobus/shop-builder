<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 25.03.2019
 * Time: 15:08
 */

namespace App\Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Order\DataTables\OrderStatusDataTable;
use App\Modules\Order\Http\Requests\CreateOrderStatusRequest;
use App\Modules\Order\Http\Requests\UpdateOrderStatusRequest;
use App\Modules\Order\Models\OrderStatus;
use Szykra\Notifications\Flash;

class OrderStatusController extends Controller
{
    /**
     * @param OrderStatusDataTable $dataTable
     * @return mixed
     */
    public function index(OrderStatusDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order-status.index');
    }

    /**
     * @param OrderStatus $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(OrderStatus $status)
    {
        return view('dashboard.order-status.edit', compact('status'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.order-status.create');
    }

    /**
     * @param CreateOrderStatusRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateOrderStatusRequest $request)
    {
        OrderStatus::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Order Status created');

        return redirect()->route('order-statuses.index');
    }

    /**
     * @param UpdateOrderStatusRequest $request
     * @param OrderStatus $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateOrderStatusRequest $request, OrderStatus $status)
    {
        $status
            ->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Order Status edited');

        return redirect()->route('order-statuses.index');
    }

    /**
     * @param OrderStatus $status
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(OrderStatus $status)
    {
        $status->delete();

        Flash::success('Order Status deleted');

        return redirect()->route('order-statuses.index');
    }
}
