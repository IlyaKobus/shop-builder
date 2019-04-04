<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 07.03.19
 * Time: 16:19
 */

namespace App\Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Caches\CategoryCache;
use App\Modules\Category\Http\Requests\CreateCategoryRequest;
use App\Modules\Category\Http\Requests\UpdateCategoryRequest;
use App\Modules\Category\Models\Category;
use Illuminate\Http\Request;
use Szykra\Notifications\Flash;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = CategoryCache::get();
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('dashboard.category.create', [
            'parentId' => $request->get('parentId'),
        ]);
    }

    /**
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCategoryRequest $request)
    {
        /** @var Category $category */
        $category = Category::create($request->all());

        $this->updateCategory($category, $request)
            ->save();

        Flash::success('Category successful updated');

        return redirect()->route('categories.index');
    }

    /**
     * @param Category $category
     * @param Request $request
     * @return \App\Models\Imagable|Category
     */
    public function updateCategory(Category $category, Request $request)
    {
        $category->parent_id = $request->get('is_root') ? null : $request->get('parent_id');

        return $category
            ->updateLocales($request->get('locales'))
            ->updateImage($request->file('image'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->updateCategory($category->fill($request->all()), $request)
            ->save();

        Flash::success('Category successful updated');

        return redirect()->route('categories.index');
    }

    /**]
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if ($category->isContainProducts()) {
            Flash::error('Yoy cant delete category that contains at least one product');
        } else {
            $category->delete();
            Flash::success('Category successful deleted');
        }

        // TODO cascade deleting nested categories

        return redirect()->route('categories.index');
    }

    /**
     * @param int $index
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxAttributeBlock(int $index)
    {
        return response()->json(
            view('dashboard.category.attribute', compact('index'))->render()
        );
    }

    /**
     * @param int $index
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxOptionBlock(int $index)
    {
        return response()->json(
            view('dashboard.category.option', compact('index'))->render()
        );
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajaxGetSelectTree()
    {
        return response()->json(
            Category::buildTree(Category::joinLocaleValue('name')
                ->get(['id', 'name']))
                ->values()
        );
    }
}
