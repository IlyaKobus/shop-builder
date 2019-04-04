<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 16:39
 */

namespace App\Modules\Layout\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class LayoutRequestAbstract extends FormRequest
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
