<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 12:17
 */

namespace App\Modules\Information\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class InformationRequestAbstract extends FormRequest
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
