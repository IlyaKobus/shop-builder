<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 01.04.2019
 * Time: 13:16
 */

namespace App\Modules\Page\DataTables;

use App\Modules\Page\Models\Page;
use Yajra\DataTables\Services\DataTable;

class PageDataTable extends DataTable
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
            ->setTransformer(function ($page) {
                return [
                    'name' => $page->name,
                    'slug' => $page->slug,
                    'action' => view('dashboard.page.actions', ['page' => $page])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Page::all();
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
                'title' => 'Page Name',
            ],
            'slug' => [
                'title' => 'Slug',
            ],
        ];
    }
}
