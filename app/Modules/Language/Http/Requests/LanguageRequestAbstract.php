<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 18.03.19
 * Time: 17:03
 */

namespace App\Modules\Language\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class LanguageRequestAbstract extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|size:2',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
