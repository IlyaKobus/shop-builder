<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 11:26
 */

namespace App\Modules\Currency\DataTables;

use App\Modules\Currency\Models\Currency;
use Yajra\DataTables\Services\DataTable;

class CurrencyDataTable extends DataTable
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
            ->setTransformer(function ($currency) {
                return [
                    'name' => $currency->name,
                    'code' => $currency->code,
                    'value' => $currency->value,
                    'action' => view('dashboard.currency.actions', ['currency' => $currency])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Currency::all();
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
                'title' => 'Currency Name',
            ],
            'code' => [
                'title' => 'Code',
            ],
        ];
    }
}
