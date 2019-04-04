<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:33
 */

namespace App\Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequestAbstract extends FormRequest
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
