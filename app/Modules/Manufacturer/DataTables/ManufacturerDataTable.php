<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 10:42
 */

namespace App\Modules\Manufacturer\DataTables;

use App\Modules\Manufacturer\Models\Manufacturer;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Services\DataTable;

class ManufacturerDataTable extends DataTable
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
            ->setTransformer(function ($manufacturer) {
                return [
                    'name' => $manufacturer->name,
                    'sort_order' => $manufacturer->sort_order,
                    'action' => view('dashboard.manufacturer.actions', ['manufacturer' => $manufacturer])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Manufacturer::all();
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
                'title' => 'Manufacturer Name',
            ],
            'sort_order' => [
                'title' => 'Sort Order',
            ],
        ];
    }
}
