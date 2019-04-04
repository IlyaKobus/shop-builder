<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 13.03.19
 * Time: 12:43
 */

namespace App\Modules\Option\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Option\DataTables\OptionDataTable;
use App\Modules\Option\Http\Requests\CreateOptionRequest;
use App\Modules\Option\Http\Requests\UpdateOptionRequest;
use App\Modules\Option\Models\Option;
use Szykra\Notifications\Flash;

class OptionController extends Controller
{
    /**
     * @param OptionDataTable $dataTable
     * @return mixed
     */
    public function index(OptionDataTable $dataTable)
    {
        return $dataTable->render('dashboard.option.index');
    }

    /**
     * @param Option $option
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Option $option)
    {
        return view('dashboard.option.edit', compact('option'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.option.create');
    }

    /**
     * @param CreateOptionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateOptionRequest $request)
    {
        Option::create($request->all())
            ->updateValues($request->allFiles(), $request->get('values'))
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Option created');

        return redirect()->route('options.index');
    }

    /**
     * @param UpdateOptionRequest $request
     * @param Option $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateOptionRequest $request, Option $option)
    {
        $option->fill($request->all())
            ->updateValues($request->allFiles(), $request->get('values'))
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Option edited');

        return redirect()->route('options.index');
    }

    /**
     * @param Option $option
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Option $option)
    {
        $option->delete();

        Flash::success('Option deleted');

        return redirect()->route('options.index');
    }

    /**
     * @param int $index
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxValueBlock(int $index)
    {
        return response()->json(
            view('dashboard.option.value', compact('index'))->render()
        );
    }
}
