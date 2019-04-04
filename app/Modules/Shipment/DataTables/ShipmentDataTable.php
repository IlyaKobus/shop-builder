<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:56
 */

namespace App\Modules\Shipment\DataTables;

use App\Modules\Shipment\Models\Shipment;
use Yajra\DataTables\Services\DataTable;

class ShipmentDataTable extends DataTable
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
            ->setTransformer(function ($shipment) {
                return [
                    'name' => $shipment->name,
                    'sort_order' => $shipment->sort_order,
                    'action' => view('dashboard.shipment.actions', ['shipment' => $shipment])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Shipment::all();
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
                'title' => 'Shipment Name',
            ],
            'sort_order' => [
                'title' => 'Sort Order',
            ],
        ];
    }
}
