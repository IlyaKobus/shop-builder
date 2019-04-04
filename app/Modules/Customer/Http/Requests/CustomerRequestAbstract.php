<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 15:06
 */

namespace App\Modules\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class CustomerRequestAbstract extends FormRequest
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
