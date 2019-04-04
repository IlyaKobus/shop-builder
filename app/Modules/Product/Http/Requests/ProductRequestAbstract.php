<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 16:52
 */

namespace App\Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ProductRequestAbstract extends FormRequest
{
    public function rules()
    {
        return [
            // general
            'locales' => 'required|array',
            'locales.*.name' => 'required|string|max:255',
            'locales.*.description' => 'nullable|string|max:10000',
            'locales.*.meta_tag_title' => 'required|string|max:255',

            // data
            'model' => 'required|string|max:255',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|integer',
            'weight' => 'nullable|numeric',

            //links
//            'categories' => 'nullable|array',
            'categories.*' => 'integer',
            'primary_category' => 'nullable|integer',

            // attribute
            'attributes' => 'nullable|array',
            'attributes.*.locales' => 'required|array',
            'attributes.*.id' => 'required|integer',
            'attributes.*.locales.*.value' => 'required|string|max:255',

            // option
            'options' => 'nullable|array',
            'options.*.values' => 'required|array',
            'options.*.values.*.id' => 'required|integer',
            'options.*.values.*.quantity' => 'nullable|integer',
            'options.*.values.*.price' => 'nullable|numeric',
            'options.*.values.*.weight' => 'nullable|numeric',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
