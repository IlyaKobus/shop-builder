<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 10:51
 */

namespace App\Modules\Manufacturer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ManufacturerRequestAbstract extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'image|max:' . config('filesystems.max_icon_size'),
        ];
    }

    public function authorize()
    {
        return true;
    }
}
