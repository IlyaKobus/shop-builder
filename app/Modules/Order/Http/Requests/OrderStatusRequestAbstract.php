<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 25.03.2019
 * Time: 15:10
 */

namespace App\Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class OrderStatusRequestAbstract extends FormRequest
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
