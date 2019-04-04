<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 10:40
 */

namespace App\Modules\Manufacturer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Manufacturer\DataTables\ManufacturerDataTable;
use App\Modules\Manufacturer\Http\Requests\CreateManufacturerRequest;
use App\Modules\Manufacturer\Http\Requests\UpdateManufacturerRequest;
use App\Modules\Manufacturer\Models\Manufacturer;
use Szykra\Notifications\Flash;

class ManufacturerController extends Controller
{
    /**
     * @param ManufacturerDataTable $dataTable
     * @return mixed
     */
    public function index(ManufacturerDataTable $dataTable)
    {
        return $dataTable->render('dashboard.manufacturer.index');
    }

    /**
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('dashboard.manufacturer.edit', compact('manufacturer'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.manufacturer.create');
    }

    /**
     * @param CreateManufacturerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateManufacturerRequest $request)
    {
        Manufacturer::create($request->all())
            ->updateImage($request->file('image'))
            ->save();

        Flash::success('Manufacturer created');

        return redirect()->route('manufacturers.index');
    }

    /**
     * @param UpdateManufacturerRequest $request
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer
            ->fill($request->all())
            ->updateImage($request->file('image'))
            ->save();

        Flash::success('Manufacturer edited');

        return redirect()->route('manufacturers.index');
    }

    /**
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        Flash::success('Manufacturer deleted');

        return redirect()->route('manufacturers.index');
    }
}
