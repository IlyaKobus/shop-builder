<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 13:22
 */

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Option\Models\Option;
use App\Modules\Product\DataTables\ProductDataTable;
use App\Modules\Product\Http\Requests\CreateProductRequest;
use App\Modules\Product\Http\Requests\UpdateProductRequest;
use App\Modules\Product\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Szykra\Notifications\Flash;

class ProductController extends Controller
{
    /**
     * @param ProductDataTable $dataTable
     * @return mixed
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('dashboard.product.index');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit', [
            'product' => $product->load([
                'locales',
                'categories.locales',
                'attributes.origin.locales',
                'options.origin.locales'
            ])
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.product.create');
    }

    /**
     * @param CreateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateProductRequest $request)
    {
        /** @var Product $product */
        $product = Product::create($request->all());

        $this->updateProductRelations($request, $product)
            ->save();

        Flash::success('Product created');

        return redirect()->route('products.index');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Product
     */
    protected function updateProductRelations(Request $request, Product $product)
    {
        return $product
            ->updateCategories($request->get('categories'))
            ->updateAttributes($request->get('attributes'))
            ->updateOptions($request->get('options'))
            ->updateImages($request->allFiles(), $request->get('images'))
            ->updateLocales($request->get('locales'));
    }

    /**
     * @param Product $product
     * @param UpdateProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->fill($request->all());

        $this->updateProductRelations($request, $product)
            ->save();

        Flash::success('Products successful updated');

        return redirect()->route('products.index');
    }

    /**
     * @param int $index
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxAttributeBlock(int $index)
    {
        return response()->json(
            view('dashboard.product.attribute', compact('index'))->render()
        );
    }

    /**
     * @param Option $option
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxOptionBlock(Option $option)
    {
        return response()->json(
            view('dashboard.product.option', compact('option'))->render()
        );
    }

    /**
     * @param Option $option
     * @param int $index
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxOptionValueBlock(Option $option, int $index)
    {
        return response()->json(
            view('dashboard.product.option-value', compact('option', 'index'))->render()
        );
    }

    /**
     * @param int $index
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxImageBlock(int $index)
    {
        return response()->json(
            view('dashboard.product.image', compact('index'))->render()
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxSearch(Request $request)
    {
        $results = Product::join('translations', 'translations.localable_id', '=', 'products.id')
            ->where('translations.localable_type', Product::class)
            ->where('translations.language_code', App::getLocale())
            ->where('key', '=', 'name')
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('value', 'LIKE', "%{$request->get('search')}%");
                })->orWhere(function ($query) use ($request) {
                    $query->where('model', 'LIKE', "%{$request->get('search')}%");
                });
            })
            ->select(['value as text', 'products.id'])->take(10)->get();

        return response()->json([
            'results' => $results
        ]);
    }
}
