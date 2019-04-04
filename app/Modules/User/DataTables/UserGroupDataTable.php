<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 29.03.2019
 * Time: 12:50
 */

namespace App\Modules\User\DataTables;

use App\Modules\User\Models\UserGroup;
use Yajra\DataTables\Services\DataTable;

class UserGroupDataTable extends DataTable
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
                    'action' => view('dashboard.user-group.actions', ['group' => $group])->render(),
                ];
            });
    }

    /**
     * @return UserGroup[]|\Illuminate\Database\Eloquent\Collection
     */
    public function query()
    {
        return UserGroup::all();
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
                'title' => 'Name',
            ],
        ];
    }
}
