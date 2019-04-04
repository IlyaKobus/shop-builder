<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 25.03.2019
 * Time: 15:05
 */

namespace App\Modules\Order\DataTables;

use App\Modules\Order\Models\OrderStatus;
use Yajra\DataTables\Services\DataTable;

class OrderStatusDataTable extends DataTable
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
            ->setTransformer(function ($status) {
                return [
                    'name' => $status->name,
                    'action' => view('dashboard.order-status.actions', ['status' => $status])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return OrderStatus::all();
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
            ->addAction(['width' => '120px'])
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
            'name' => [
                'title' => 'Order Status Name',
            ],
        ];
    }
}
