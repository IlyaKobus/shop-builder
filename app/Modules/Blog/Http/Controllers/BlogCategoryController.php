<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 10:54
 */

namespace App\Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\DataTables\BlogCategoryDataTable;
use App\Modules\Blog\Http\Requests\CreateBlogCategoryRequest;
use App\Modules\Blog\Http\Requests\UpdateBlogCategoryRequest;
use App\Modules\Blog\Models\BlogCategory;
use Illuminate\Http\Request;
use Szykra\Notifications\Flash;

class BlogCategoryController extends Controller
{
    /**
     * @param BlogCategoryDataTable $dataTable
     * @return mixed
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('dashboard.blog-category.index');
    }

    /**
     * @param BlogCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BlogCategory $category)
    {
        return view('dashboard.blog-category.edit', compact('category'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.blog-category.create');
    }

    /**
     * @param CreateBlogCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateBlogCategoryRequest $request)
    {
        $category = BlogCategory::create($request->all());
        $this->updateCategory($category, $request)
            ->save();

        Flash::success('Blog Category created');

        return redirect()->route('blog-categories.index');
    }

    /**
     * @param BlogCategory $category
     * @param Request $request
     * @return \App\Models\Imagable|BlogCategory
     */
    protected function updateCategory(BlogCategory $category, Request $request)
    {
        return $category
            ->updateLocales($request->get('locales'))
            ->updateImage($request->file('image'));
    }

    /**
     * @param UpdateBlogCategoryRequest $request
     * @param BlogCategory $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogCategoryRequest $request, BlogCategory $category)
    {
        $category->fill($request->all());
        $this->updateCategory($category, $request)
            ->save();

        Flash::success('Blog Category edited');

        return redirect()->route('blog-categories.index');
    }

    /**
     * @param BlogCategory $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(BlogCategory $category)
    {
        $category->delete();

        Flash::success('Blog Category deleted');

        return redirect()->route('blog-categories.index');
    }
}
