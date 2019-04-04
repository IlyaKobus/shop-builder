<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:23
 */

namespace App\Modules\Order\DataTables;

use App\Modules\Order\Models\Order;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    public function ajax()
    {
        return $this->dataTable($this->query())
            ->make(true);
    }

    /**
     * @param $query
     * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->setTransformer(function ($order) {
                return [
                    'id' => $order->id,
                    'customer' => $order->customer->name,
                    'status' => $order->status ? ucfirst($order->status->name) : null,
                    'total' => $order->total,
                    'date_added' => date('d/m/Y', strtotime($order->created_at)),
                    'date_modified' => date('d/m/Y', strtotime($order->updated_at)),
                    'action' => view('dashboard.order.actions', ['order' => $order])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Order::with(['customer'])
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->get(['orders.*']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => [
                'title' => 'Order ID',
            ],
            'customer' => [
                'title' => 'Customer',
            ],
            'status' => [
                'title' => 'Status',
            ],
            'total' => [
                'title' => 'Total',
            ],
            'date_added' => [
                'title' => 'Date Added',
            ],
            'date_modified' => [
                'title' => 'Date Modified',
            ],
        ];
    }
}
