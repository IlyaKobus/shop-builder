<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 12:57
 */

namespace App\Modules\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class PaymentRequestAbstract extends FormRequest
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
