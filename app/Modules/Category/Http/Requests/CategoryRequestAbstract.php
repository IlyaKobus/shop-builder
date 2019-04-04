<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 13:09
 */

namespace App\Modules\Category\Http\Requests;

use App\Modules\Category\Enums\CategoryStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

abstract class CategoryRequestAbstract extends FormRequest
{
    public function rules()
    {
        return [
            'image' => 'nullable|image|max:' . config('filesystems.max_icon_size'),
            'parent_id' => 'nullable|integer',
            'status' => 'required|string|' . Rule::in(CategoryStatusEnum::toArray()),
            'locales' => 'array',
            'locales.*.name' => 'required|string|max:255',
            'locales.*.description' => 'nullable|string|max:10000',
            'locales.*.meta_tag_title' => 'required|string|max:255',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
