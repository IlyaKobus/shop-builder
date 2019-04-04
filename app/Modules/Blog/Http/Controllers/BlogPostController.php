<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 10:54
 */

namespace App\Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\DataTables\BlogPostDataTable;
use App\Modules\Blog\Http\Requests\CreateBlogPostRequest;
use App\Modules\Blog\Http\Requests\UpdateBlogPostRequest;
use App\Modules\Blog\Models\BlogPost;
use Illuminate\Http\Request;
use Szykra\Notifications\Flash;

class BlogPostController extends Controller
{
    /**
     * @param BlogPostDataTable $dataTable
     * @return mixed
     */
    public function index(BlogPostDataTable $dataTable)
    {
        return $dataTable->render('dashboard.blog-post.index');
    }

    /**
     * @param BlogPost $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(BlogPost $post)
    {
        return view('dashboard.blog-post.edit', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.blog-post.create');
    }

    /**
     * @param CreateBlogPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateBlogPostRequest $request)
    {
        $post = BlogPost::create($request->all());
        $this->updatePost($post, $request)
            ->save();

        Flash::success('Blog Post created');

        return redirect()->route('blog-posts.index');
    }

    /**
     * @param BlogPost $category
     * @param Request $request
     * @return \App\Models\Imagable|BlogPost
     */
    protected function updatePost(BlogPost $post, Request $request)
    {
        return $post
            ->updateLocales($request->get('locales'))
            ->updateImage($request->file('image'))
            ->updateCategories($request->get('blog-categories', []));
    }

    /**
     * @param UpdateBlogPostRequest $request
     * @param BlogPost $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlogPostRequest $request, BlogPost $post)
    {
        $post->fill($request->all());
        $this->updatePost($post, $request)
            ->save();

        Flash::success('Blog Post edited');

        return redirect()->route('blog-posts.index');
    }

    /**
     * @param BlogPost $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(BlogPost $post)
    {
        $post->delete();

        Flash::success('Blog Post deleted');

        return redirect()->route('blog-posts.index');
    }
}
