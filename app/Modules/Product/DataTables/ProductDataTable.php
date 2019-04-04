<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 13:39
 */

namespace App\Modules\Product\DataTables;

use App\Modules\Product\Models\Product;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->setTransformer(function ($product) {
                return [
                    'main_image' => "<img style='width: 160px;' src='$product->main_image' alt=''/>",
                    'name' => $product->name,
                    'model' => $product->model,
                    'price' => $product->price,
                    'quantity' => $product->quantity,
                    'status' => ucfirst($product->status),
                    'action' => view('dashboard.product.actions', ['product' => $product])->render(),
                ];
            });
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Product::withLocales()
            ->join('translations', 'products.id', '=', 'translations.localable_id')
            ->where('translations.localable_type', Product::class)
            ->where('translations.language_code', App::getLocale())
            ->groupBy('products.id')
            ->get(['products.*']);
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
            'main_image' => [
                'title' => 'Image',
                'orderable' => false,
                'searchable' => false,
            ],
            'name' => [
                'title' => 'Name',
            ],
            'model' => [
                'title' => 'Model',
            ],
            'price' => [
                'title' => 'Price',
            ],
            'quantity' => [
                'title' => 'Quantity',
            ],
            'status' => [
                'title' => 'Status'
            ]
        ];
    }
}
