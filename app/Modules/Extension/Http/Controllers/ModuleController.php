<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 13:52
 */

namespace App\Modules\Extension\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Extension\DataTables\ModuleDataTable;
use App\Modules\Extension\Http\Requests\CreateModuleRequest;
use App\Modules\Extension\Http\Requests\UpdateExtensionRequest;
use App\Modules\Extension\Models\Module;
use Szykra\Notifications\Flash;

class ModuleController extends Controller
{
    /**
     * @param ModuleDataTable $dataTable
     * @return mixed
     */
    public function index(ModuleDataTable $dataTable)
    {
        return $dataTable->render('dashboard.module.index');
    }

    /**
     * @param Module $module
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Module $module)
    {
        return view('dashboard.module.edit', compact('module'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.module.create');
    }

    /**
     * @param CreateModuleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateModuleRequest $request)
    {
        Module::create($request->all())
            ->updateOptions($request->get('options'))
            ->save();

        Flash::success('Module created');

        return redirect()->route('modules.index');
    }

    /**
     * @param UpdateExtensionRequest $request
     * @param Module $module
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateExtensionRequest $request, Module $module)
    {
        $module->fill($request->all())
            ->save();

        Flash::success('Module edited');

        return redirect()->route('modules.index');
    }

    /**
     * @param Module $module
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Module $module)
    {
        $module->delete();

        Flash::success('Module deleted');

        return redirect()->route('modules.index');
    }
}
