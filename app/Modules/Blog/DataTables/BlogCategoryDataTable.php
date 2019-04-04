<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 11:04
 */

namespace App\Modules\Blog\DataTables;

use App\Modules\Blog\Models\BlogCategory;
use Yajra\DataTables\Services\DataTable;

class BlogCategoryDataTable extends DataTable
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
            ->setTransformer(function ($category) {
                return [
                    'title' => $category->title,
                    'action' => view('dashboard.blog-category.actions', ['category' => $category])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return BlogCategory::all();
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
                'title' => 'Category Title',
            ],
        ];
    }
}
