<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:32
 */

namespace App\Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Order\DataTables\OrderDataTable;
use App\Modules\Order\Http\Requests\CreateOrderRequest;
use App\Modules\Order\Http\Requests\UpdateOrderRequest;
use App\Modules\Order\Models\Order;
use App\Modules\Product\Models\Product;
use Illuminate\Http\Request;
use Szykra\Notifications\Flash;

class OrderController extends Controller
{
    /**
     * @param OrderDataTable $dataTable
     * @return mixed
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.index');
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('dashboard.order.show', compact('order'));
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order)
    {
        return view('dashboard.order.edit', compact('order'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.order.create');
    }

    /**
     * @param CreateOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateOrderRequest $request)
    {
        Order::create(array_merge($request->all(), $this->buildAddresses($request)))
            ->updateProducts($request->get('products'), $request->get('currency_id'))
            ->save();

        Flash::success('Order created');

        return redirect()->route('orders.index');
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function buildAddresses(Request $request)
    {
        $result = [
            'payment_address' => join(', ', array_values($request->get('payment'))),
            'shipping_address' => join(', ', array_values($request->get('shipping'))),
        ];

        return $result;
    }

    /**
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->fill($request->all())
            ->save();

        Flash::success('Order edited');

        return redirect()->route('orders.index');
    }

    /**
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        $order->delete();

        Flash::success('Order deleted');

        return redirect()->route('orders.index');
    }

    /**
     * @param Request $request
     * @param Order $order
     * @return string
     * @throws \Throwable
     */
    public function addEvent(Request $request, Order $order)
    {
        $order->events()->create($request->all());
        $order->fill([
            'status_id' => $request->get('status_id')
        ])->save();

        return view('dashboard.order.events', compact('order'))->render();
    }

    /**
     * @param Product $product
     * @param int $index
     * @return string
     * @throws \Throwable
     */
    public function ajaxProductBlock(Product $product, int $index)
    {
        return view('dashboard.order.product', compact('product', 'index'))->render();
    }
}
