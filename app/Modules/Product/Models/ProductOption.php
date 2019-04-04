<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 12:14
 */

namespace App\Modules\Product\Models;

use App\Modules\Option\Models\Option;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    public $table = 'option_product';

    protected $fillable = [
        'option_id',
    ];

    private $localable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origin()
    {
        return $this->belongsTo(Option::class, 'option_id');
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
        return $this->origin->name;
    }

    /**
     * @param array|null $data
     * @return $this
     */
    public function updateValues(?array $data = [])
    {
        if (is_null($data)) {
            return $this;
        }

        $valueIds = array_map(function ($val) {
            return $val['id'];
        }, $data);

        $this->values()->whereNotIn('option_value_id', $valueIds)->delete();

        foreach ($data as $val) {
            $this->values()->updateOrCreate(
                [
                    'option_value_id' => $val['id'],
                ],
                $val
            );
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(ProductOptionValue::class, 'option_product_id');
    }
}
