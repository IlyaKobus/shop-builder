<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 11:03
 */

namespace App\Modules\Blog\DataTables;

use App\Modules\Blog\Models\BlogPost;
use Yajra\DataTables\Services\DataTable;

class BlogPostDataTable extends DataTable
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
            ->setTransformer(function ($post) {
                return [
                    'title' => $post->title,
                    'action' => view('dashboard.blog-post.actions', ['post' => $post])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return BlogPost::all();
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
                'title' => 'Post title',
            ],
        ];
    }
}
