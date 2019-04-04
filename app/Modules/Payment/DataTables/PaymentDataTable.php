<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 12:53
 */

namespace App\Modules\Payment\DataTables;

use App\Modules\Payment\Models\Payment;
use Yajra\DataTables\Services\DataTable;

class PaymentDataTable extends DataTable
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
            ->setTransformer(function ($payment) {
                return [
                    'name' => $payment->name,
                    'sort_order' => $payment->sort_order,
                    'action' => view('dashboard.payment.actions', ['payment' => $payment])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Payment::all();
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
            'name' => [
                'title' => 'Payment Name',
            ],
            'sort_order' => [
                'title' => 'Sort Order',
            ],
        ];
    }
}
