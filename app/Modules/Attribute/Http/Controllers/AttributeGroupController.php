<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 13.03.19
 * Time: 10:37
 */

namespace App\Modules\Attribute\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Attribute\DataTables\AttributeGroupDataTable;
use App\Modules\Attribute\Http\Requests\CreateAttributeGroupRequest;
use App\Modules\Attribute\Http\Requests\UpdateAttributeGroupRequest;
use App\Modules\Attribute\Models\AttributeGroup;
use Szykra\Notifications\Flash;

class AttributeGroupController extends Controller
{
    /**
     * @param AttributeGroupDataTable $dataTable
     * @return mixed
     */
    public function index(AttributeGroupDataTable $dataTable)
    {
        return $dataTable->render('dashboard.attribute-group.index');
    }

    /**
     * @param AttributeGroup $attributeGroup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(AttributeGroup $attributeGroup)
    {
        return view('dashboard.attribute-group.edit', compact('attributeGroup'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('dashboard.attribute-group.create');
    }

    /**
     * @param CreateAttributeGroupRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAttributeGroupRequest $request)
    {
        AttributeGroup::create($request->all())
            ->updateLocales($request->get('locales'));

        Flash::success('Attribute created');

        return redirect()->route('attribute-groups.index');
    }

    /**
     * @param UpdateAttributeGroupRequest $request
     * @param AttributeGroup $attributeGroup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttributeGroupRequest $request, AttributeGroup $attributeGroup)
    {
        $attributeGroup->fill($request->all())
            ->updateLocales($request->get('locales'))
            ->save();

        Flash::success('Attribute edited');

        return redirect()->route('attribute-groups.index');
    }

    /**
     * @param AttributeGroup $attributeGroup
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(AttributeGroup $attributeGroup)
    {
        $attributeGroup->delete();

        Flash::success('Attribute deleted');

        return redirect()->route('attribute-groups.index');
    }
}
