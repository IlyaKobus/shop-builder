<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 14:05
 */

namespace App\Modules\Shipment\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Shipment\DataTables\ShipmentDataTable;
use App\Modules\Shipment\Http\Requests\CreateShipmentRequest;
use App\Modules\Shipment\Http\Requests\UpdateShipmentRequest;
use App\Modules\Shipment\Models\Shipment;
use Szykra\Notifications\Flash;

class ShipmentController extends Controller
{
    /**
     * @param ShipmentDataTable $dataTable
     * @return mixed
     */
    public function index(ShipmentDataTable $dataTable)
    {
        return $dataTable->render('dashboard.shipment.index');
    }

    /**
     * @param Shipment $shipment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Shipment $shipment)
    {
        return view('dashboard.shipment.edit', compact('shipment'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.shipment.create');
    }

    /**
     * @param CreateShipmentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateShipmentRequest $request)
    {
        Shipment::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Shipment created');

        return redirect()->route('shipments.index');
    }

    /**
     * @param UpdateShipmentRequest $request
     * @param Shipment $shipment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Shipment edited');

        return redirect()->route('shipments.index');
    }

    /**
     * @param Shipment $shipment
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();

        Flash::success('Shipment deleted');

        return redirect()->route('shipments.index');
    }
}
