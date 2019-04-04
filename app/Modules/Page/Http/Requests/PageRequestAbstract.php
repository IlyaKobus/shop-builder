<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 01.04.2019
 * Time: 13:38
 */

namespace App\Modules\Page\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequestAbstract extends FormRequest
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
