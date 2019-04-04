<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 15:06
 */

namespace App\Modules\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class CustomerGroupRequestAbstract extends FormRequest
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
