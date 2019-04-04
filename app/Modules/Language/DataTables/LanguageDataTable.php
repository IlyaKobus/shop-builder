<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 18.03.19
 * Time: 16:53
 */

namespace App\Modules\Language\DataTables;

use App\Modules\Language\Models\Language;
use Yajra\DataTables\Services\DataTable;

class LanguageDataTable extends DataTable
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
            ->setTransformer(function ($language) {
                return [
                    'name' => "{$language->name} <span class=\"flag-icon flag-icon-{$language->code}\"></span>",
                    'code' => $language->code,
                    'action' => view('dashboard.language.actions', ['language' => $language])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Language::all();
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
                'title' => 'Language Name',
            ],
            'code' => [
                'title' => 'Language Code',
            ],
        ];
    }
}
