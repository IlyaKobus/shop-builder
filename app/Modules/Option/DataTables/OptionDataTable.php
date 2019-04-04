<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 13.03.19
 * Time: 12:44
 */

namespace App\Modules\Option\DataTables;

use App\Modules\Option\Models\Option;
use Yajra\DataTables\Services\DataTable;

class OptionDataTable extends DataTable
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
            ->setTransformer(function ($option) {
                return [
                    'name' => $option->name,
                    'sort_order' => $option->sort_order,
                    'action' => view('dashboard.option.actions', ['option' => $option])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Option::all();
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
                'title' => 'Option Name',
            ],
            'sort_order' => [
                'title' => 'Sort Order',
            ],
        ];
    }
}
