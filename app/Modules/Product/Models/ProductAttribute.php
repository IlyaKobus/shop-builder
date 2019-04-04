<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 17:31
 */

namespace App\Modules\Product\Models;

use App\Models\Localable;
use App\Modules\Attribute\Models\Attribute;

class ProductAttribute extends Localable
{
    public $table = 'attribute_product';

    protected $fillable = [
        'product_id',
        'attribute_id',
    ];

    private $localable = [
        'value',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origin()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->origin->getLocaled('name');
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
