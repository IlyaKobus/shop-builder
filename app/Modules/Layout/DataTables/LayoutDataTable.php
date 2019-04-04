<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 16:18
 */

namespace App\Modules\Layout\DataTables;

use App\Modules\Layout\Models\Layout;
use Yajra\DataTables\Services\DataTable;

class LayoutDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse|mixed
     * @throws \Exception
     */
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
            ->setTransformer(function ($layout) {
                return [
                    'name' => $layout->name,
                    'action' => view('dashboard.layout.actions', ['layout' => $layout])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Layout::all();
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
                'title' => 'Extension Name',
            ],
        ];
    }
}
