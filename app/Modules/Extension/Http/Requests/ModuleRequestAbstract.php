<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 13:53
 */

namespace App\Modules\Extension\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ModuleRequestAbstract extends FormRequest
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
