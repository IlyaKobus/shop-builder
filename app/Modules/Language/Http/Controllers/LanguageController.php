<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 18.03.19
 * Time: 16:52
 */

namespace App\Modules\Language\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Language\DataTables\LanguageDataTable;
use App\Modules\Language\Http\Requests\CreateLanguageRequest;
use App\Modules\Language\Http\Requests\UpdateLanguageRequest;
use App\Modules\Language\Models\Language;
use Szykra\Notifications\Flash;

class LanguageController extends Controller
{
    /**
     * @param LanguageDataTable $dataTable
     * @return mixed
     */
    public function index(LanguageDataTable $dataTable)
    {
        return $dataTable->render('dashboard.language.index');
    }

    /**
     * @param Language $language
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Language $language)
    {
        return view('dashboard.language.edit', compact('language'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.language.create');
    }

    /**
     * @param CreateLanguageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateLanguageRequest $request)
    {
        /** @var Language $language */
        $language = Language::create($request->all());

        Flash::success(__('flash.actions.language.created', ['name' => $language->name]));

        return redirect()->route('languages.index');
    }

    /**
     * @param UpdateLanguageRequest $request
     * @param Language $language
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language->fill($request->all())
            ->save();

        Flash::success(__('flash.actions.language.updated', ['name' => $language->name]));

        return redirect()->route('languages.index');
    }

    /**
     * @param Language $language
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Language $language)
    {
        $language->delete();

        Flash::success(__('flash.actions.language.deleted', ['name' => $language->name]));

        return redirect()->route('languages.index');
    }
}
