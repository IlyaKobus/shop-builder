<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 12:15
 */

namespace App\Modules\Product\Models;

use App\Modules\Option\Models\OptionValue;
use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{
    protected $fillable = [
        'quantity',
        'price',
        'weight',
        'option_value_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function option()
    {
        return $this->belongsTo(ProductOption::class, 'option_product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origin()
    {
        return $this->belongsTo(OptionValue::class, 'option_value_id');
    }

    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->origin->name;
    }
}
