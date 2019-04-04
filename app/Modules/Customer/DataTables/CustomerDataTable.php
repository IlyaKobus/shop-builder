<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 15:09
 */

namespace App\Modules\Customer\DataTables;

use App\Modules\Customer\Models\Customer;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
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
            ->setTransformer(function ($customer) {
                return [
                    'name' => $customer->name,
                    'email' => $customer->email,
                    'group' => $customer->group->name,
                    'status' => ucfirst($customer->status),
                    'date_added' => date('d/m/Y', strtotime($customer->created_at)),
                    'action' => view('dashboard.customer.actions', ['customer' => $customer])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Customer::all();
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
                'title' => 'Customer Name',
            ],
            'email' => [
                'title' => 'E-mail',
            ],
            'group' => [
                'title' => 'Customer Group',
            ],
            'status' => [
                'title' => 'Status',
            ],
            'date_added' => [
                'title' => 'Date Added',
            ],
        ];
    }
}
