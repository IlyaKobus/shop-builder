<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 12:04
 */

namespace App\Modules\Option\Models;

use App\Enums\FilePathEnum;
use App\Models\Imagable;
use App\Models\Localable;

class OptionValue extends Localable
{
    use Imagable;

    protected $image_path = FilePathEnum::ICON_OPTION_VALUE;

    protected $fillable = [
        'sort_order',
        'image',
    ];

    private $localable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
