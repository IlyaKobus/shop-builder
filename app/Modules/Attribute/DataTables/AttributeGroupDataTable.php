<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 18:21
 */

namespace App\Modules\Attribute\DataTables;

use App\Modules\Attribute\Models\AttributeGroup;
use Yajra\DataTables\Services\DataTable;

class AttributeGroupDataTable extends DataTable
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
            ->setTransformer(function ($attributeGroup) {
                return [
                    'name' => $attributeGroup->name,
                    'sort_order' => $attributeGroup->sort_order,
                    'action' => view('dashboard.attribute-group.actions', compact('attributeGroup'))->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return AttributeGroup::all();
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
                'title' => 'Attribute Group Name',
            ],
            'sort_order' => [
                'title' => 'Sort Order',
            ],
        ];
    }
}
