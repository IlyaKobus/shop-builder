<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 12:57
 */

namespace App\Modules\Extension\DataTables;

use App\Modules\Extension\Models\Extension;
use Yajra\DataTables\Services\DataTable;

class ExtensionDataTable extends DataTable
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
            ->setTransformer(function ($extension) {
                return [
                    'name' => $extension->name,
                    'status' => ucfirst($extension->status),
                    'action' => view('dashboard.extension.actions', ['extension' => $extension])->render(),
                ];
            });
    }

    /**
     * @return Extension[]|\Illuminate\Database\Eloquent\Collection
     */
    public function query()
    {
        return Extension::all();
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
            'status' => [
                'title' => 'Status',
            ],
        ];
    }
}
