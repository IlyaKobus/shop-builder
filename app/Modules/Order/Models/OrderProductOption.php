<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 26.03.2019
 * Time: 21:54
 */

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProductOption extends Model
{
    protected $fillable = [
        'name',
        'value',
        'order_product_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(OrderProduct::class, 'order_product_id');
    }
}
