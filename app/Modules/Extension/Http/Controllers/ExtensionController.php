<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 12:56
 */

namespace App\Modules\Extension\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Extension\DataTables\ExtensionDataTable;
use App\Modules\Extension\Http\Requests\CreateExtensionRequest;
use App\Modules\Extension\Http\Requests\UpdateExtensionRequest;
use App\Modules\Extension\Models\Extension;
use Szykra\Notifications\Flash;

class ExtensionController extends Controller
{
    /**
     * @param ExtensionDataTable $dataTable
     * @return mixed
     */
    public function index(ExtensionDataTable $dataTable)
    {
        return $dataTable->render('dashboard.extension.index');
    }

    /**
     * @param Extension $extension
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Extension $extension)
    {
        return view('dashboard.extension.edit', compact('extension'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.extension.create');
    }

    /**
     * @param CreateExtensionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateExtensionRequest $request)
    {
        Extension::create($request->all())
            ->createFiles()
            ->save();

        Flash::success('Extension created. You can find its views skeleton in your view folder');

        return redirect()->route('extensions.index');
    }

    /**
     * @param UpdateExtensionRequest $request
     * @param Extension $extension
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateExtensionRequest $request, Extension $extension)
    {
        $extension->fill($request->all())
            ->updateFileNames()
            ->save();

        Flash::success('Extension edited');

        return redirect()->route('extensions.index');
    }

    /**
     * @param Extension $extension
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Extension $extension)
    {
        $extension->delete();

        Flash::success('Extension deleted');

        return redirect()->route('extensions.index');
    }

    /**
     * @param Extension $extension
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function ajaxGetSettings(Extension $extension)
    {
        return response()->json(
            view("dashboard.extension.instances.{$extension->name}.options")->render()
        );
    }
}
