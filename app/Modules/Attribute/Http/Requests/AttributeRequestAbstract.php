<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 13.03.19
 * Time: 11:53
 */

namespace App\Modules\Attribute\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AttributeRequestAbstract extends FormRequest
{
    public function rules()
    {
        return [
            'locales.*.name' => 'required|string|max:255',
            'attribute_group_id' => 'nullable|integer',
            'sort_order' => 'nullable|integer',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
