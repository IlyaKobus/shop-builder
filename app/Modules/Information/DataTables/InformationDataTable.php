<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 12:14
 */

namespace App\Modules\Information\DataTables;

use App\Modules\Information\Models\Information;
use Yajra\DataTables\Services\DataTable;

class InformationDataTable extends DataTable
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
            ->setTransformer(function ($information) {
                return [
                    'title' => $information->title,
                    'sort_order' => $information->sort_order,
                    'action' => view('dashboard.information.actions', ['information' => $information])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Information::all();
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
            'title' => [
                'title' => 'Information Title',
            ],
            'sort_order' => [
                'title' => 'Sort Order',
            ],
        ];
    }
}
