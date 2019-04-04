<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 13.03.19
 * Time: 12:47
 */

namespace App\Modules\Option\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class OptionRequestAbstract extends FormRequest
{
    public function rules()
    {
        return [

        ];
    }

    public function authorize()
    {
        return true;
    }
}
