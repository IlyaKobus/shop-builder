<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 13:05
 */

namespace App\Modules\Extension\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class ExtensionRequestAbstract extends FormRequest
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
