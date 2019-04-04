<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 11:01
 */

namespace App\Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BlogCategoryRequestAbstract extends FormRequest
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
