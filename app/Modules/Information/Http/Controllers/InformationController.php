<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 12:10
 */

namespace App\Modules\Information\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Information\DataTables\InformationDataTable;
use App\Modules\Information\Http\Requests\CreateInformationRequest;
use App\Modules\Information\Http\Requests\UpdateInformationRequest;
use App\Modules\Information\Models\Information;
use Szykra\Notifications\Flash;

class InformationController extends Controller
{
    /**
     * @param InformationDataTable $dataTable
     * @return mixed
     */
    public function index(InformationDataTable $dataTable)
    {
        return $dataTable->render('dashboard.information.index');
    }

    /**
     * @param Information $information
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Information $information)
    {
        return view('dashboard.information.edit', compact('information'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.information.create');
    }

    /**
     * @param CreateInformationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateInformationRequest $request)
    {
        Information::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Information created');

        return redirect()->route('information.index');
    }

    /**
     * @param UpdateInformationRequest $request
     * @param Information $information
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateInformationRequest $request, Information $information)
    {
        $information->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Information edited');

        return redirect()->route('information.index');
    }

    /**
     * @param Information $information
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Information $information)
    {
        $information->delete();

        Flash::success('Information deleted');

        return redirect()->route('information.index');
    }
}
