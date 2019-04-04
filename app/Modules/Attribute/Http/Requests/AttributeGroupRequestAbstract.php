<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 13.03.19
 * Time: 11:55
 */

namespace App\Modules\Attribute\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeGroupRequestAbstract extends FormRequest
{
    public function rules()
    {
        return [
            'locales.*.name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
