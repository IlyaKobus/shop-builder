<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 18:31
 */

namespace App\Modules\Attribute\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Attribute\DataTables\AttributeDataTable;
use App\Modules\Attribute\Http\Requests\CreateAttributeRequest;
use App\Modules\Attribute\Http\Requests\UpdateAttributeRequest;
use App\Modules\Attribute\Models\Attribute;
use Szykra\Notifications\Flash;

class AttributeController extends Controller
{
    /**
     * @param AttributeDataTable $dataTable
     * @return mixed
     */
    public function index(AttributeDataTable $dataTable)
    {
        return $dataTable->render('dashboard.attribute.index');
    }

    /**
     * @param Attribute $attribute
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Attribute $attribute)
    {
        return view('dashboard.attribute.edit', compact('attribute'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.attribute.create');
    }

    /**
     * @param CreateAttributeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAttributeRequest $request)
    {
        Attribute::create($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Attribute created');

        return redirect()->route('attributes.index');
    }

    /**
     * @param UpdateAttributeRequest $request
     * @param Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeRequest $request, Attribute $attribute)
    {
        $attribute->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Attribute edited');

        return redirect()->route('attributes.index');
    }

    /**
     * @param Attribute $attribute
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        Flash::success('Attribute deleted');

        return redirect()->route('attributes.index');
    }
}
