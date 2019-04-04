<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:22
 */

namespace App\Modules\Order\Models;

use App\Helpers\MathHelper;
use App\Modules\Currency\Models\Currency;
use App\Modules\Customer\Models\Customer;
use App\Modules\Payment\Models\Payment;
use App\Modules\Product\Models\Product;
use App\Modules\Shipment\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = [
        'status_id',
        'payment_address',
        'shipping_address',
        'payment_id',
        'shipment_id',
        'status_id',
        'customer_id',
        'currency_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany(OrderEvent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * @return mixed
     */
    public function getTotalAttribute()
    {
        return $this->products()->sum(DB::raw('quantity * price'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * @param array|null $products
     * @param $currencyId
     * @return $this
     */
    public function updateProducts(?array $products, $currencyId)
    {
        if (!is_null($products)) {
            foreach ($products as $id => $productItems) {
                /** @var Product $origin */
                $origin = Product::find($id);

                $ids = array_map(function ($product) {
                    return $product['id'] ?? null;
                }, $productItems);

                $this->products()->whereNotIn('id', $ids)->delete();

                foreach ($productItems as $product) {
                    /** @var OrderProduct $orderProduct */
                    $orderProduct = $this->products()->updateOrCreate([
                        'id' => $product['id'] ?? null
                    ], array_merge($product, [
                        'name' => $origin->name,
                        'model' => $origin->model,
                        'price' => MathHelper::convertCurrency($origin->currency->id, $currencyId, $origin->price),
                        'origin_id' => $origin->id
                    ]));

                    foreach ($product['options'] ?? [] as $option) {
                        $orderProduct->options()->create($option);
                    }
                }
            }
        }

        return $this;
    }
}
