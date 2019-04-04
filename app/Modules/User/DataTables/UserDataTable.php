<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 06.03.19
 * Time: 13:24
 */

namespace App\Modules\User\DataTables;

use App\Modules\User\Models\User;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->setTransformer(function ($user) {
                return [
                    'username' => $user->username,
                    'email' => $user->email,
                    'action' => view('dashboard.user.actions', ['user' => $user])->render(),
                ];
            });
    }

    /**
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::select('id', 'username', 'email', 'created_at', 'updated_at');
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
            'username' => [
                'title' => 'Username',
            ],
            'email' => [
                'title' => 'Email',
            ],
        ];
    }
}
