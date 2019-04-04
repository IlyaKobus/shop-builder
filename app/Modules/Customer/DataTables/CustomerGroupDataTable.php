<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 15:09
 */

namespace App\Modules\Customer\DataTables;

use App\Modules\Customer\Models\CustomerGroup;
use Yajra\DataTables\Services\DataTable;

class CustomerGroupDataTable extends DataTable
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
            ->setTransformer(function ($group) {
                return [
                    'name' => $group->name,
                    'sort_order' => $group->sort_order,
                    'action' => view('dashboard.customer-group.actions', ['group' => $group])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return CustomerGroup::all();
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
                'title' => 'Customer Group Name',
            ],
            'sort_order' => [
                'title' => 'Sort Order',
            ],
        ];
    }
}
