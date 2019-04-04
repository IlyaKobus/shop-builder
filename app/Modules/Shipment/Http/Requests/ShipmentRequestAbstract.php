<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 14:07
 */

namespace App\Modules\Shipment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShipmentRequestAbstract extends FormRequest
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
