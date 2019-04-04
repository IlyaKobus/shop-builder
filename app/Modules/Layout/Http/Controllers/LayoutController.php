<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 16:39
 */

namespace App\Modules\Layout\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Layout\DataTables\LayoutDataTable;
use App\Modules\Layout\Http\Requests\CreateLayoutRequest;
use App\Modules\Layout\Http\Requests\UpdateLayoutRequest;
use App\Modules\Layout\Models\Layout;
use Szykra\Notifications\Flash;

class LayoutController extends Controller
{
    /**
     * @param LayoutDataTable $dataTable
     * @return mixed
     */
    public function index(LayoutDataTable $dataTable)
    {
        return $dataTable->render('dashboard.layout.index');
    }

    /**
     * @param Layout $layout
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Layout $layout)
    {
        return view('dashboard.layout.edit', compact('layout'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.layout.create');
    }

    /**
     * @param CreateLayoutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateLayoutRequest $request)
    {
        Layout::create($request->all())
            ->updateModules($request->get('modules'))
            ->save();

        Flash::success('Layout created');

        return redirect()->route('layouts.index');
    }

    /**
     * @param UpdateLayoutRequest $request
     * @param Layout $layout
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateLayoutRequest $request, Layout $layout)
    {
        $layout->fill($request->all())
            ->updateModules($request->get('modules'))
            ->save();

        Flash::success('Layout edited');

        return redirect()->route('layouts.index');
    }

    /**
     * @param Layout $layout
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Layout $layout)
    {
        $layout->delete();

        Flash::success('Layout deleted');

        return redirect()->route('layouts.index');
    }

    /**
     * @param int $index
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxModule(string $type, int $index)
    {
        return response()->json(
            view('dashboard.layout.module', compact('index', 'type'))->render()
        );
    }
}
