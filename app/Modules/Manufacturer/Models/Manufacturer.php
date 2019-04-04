<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 10:43
 */

namespace App\Modules\Manufacturer\Models;

use App\Enums\FilePathEnum;
use App\Models\Imagable;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use Imagable;

    protected $image_path = FilePathEnum::ICON_MANUFACTURER;

    protected $fillable = [
        'name',
        'image',
        'sort_order',
    ];
}
