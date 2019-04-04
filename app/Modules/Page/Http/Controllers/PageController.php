<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 01.04.2019
 * Time: 13:36
 */

namespace App\Modules\Page\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Page\DataTables\PageDataTable;
use App\Modules\Page\Http\Requests\CreatePageRequest;
use App\Modules\Page\Http\Requests\UpdatePageRequest;
use App\Modules\Page\Models\Page;
use Szykra\Notifications\Flash;

class PageController extends Controller
{
    /**
     * @param PageDataTable $dataTable
     * @return mixed
     */
    public function index(PageDataTable $dataTable)
    {
        return $dataTable->render('dashboard.page.index');
    }

    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('dashboard.page.edit', compact('page'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.page.create');
    }

    /**
     * @param CreatePageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePageRequest $request)
    {
        Page::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Page created');

        return redirect()->route('pages.index');
    }

    /**
     * @param UpdatePageRequest $request
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Page edited');

        return redirect()->route('pages.index');
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();

        Flash::success('Page deleted');

        return redirect()->route('pages.index');
    }
}
