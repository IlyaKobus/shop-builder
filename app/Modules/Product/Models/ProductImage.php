<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 18.03.19
 * Time: 18:29
 */

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'url',
        'sort_order',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @param $value
     * @return \Illuminate\Config\Repository|mixed
     */
    public function getUrlAttribute($value)
    {
        return $value ?? config('dashboard.default_image_url');
    }
}