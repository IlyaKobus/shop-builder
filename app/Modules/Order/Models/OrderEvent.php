<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 25.03.2019
 * Time: 11:28
 */

namespace App\Modules\Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderEvent extends Model
{
    protected $fillable = [
        'comment',
        'is_notify_customer',
        'status_id',
        'order_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
