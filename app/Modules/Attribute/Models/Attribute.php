<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 18:55
 */

namespace App\Modules\Attribute\Models;

use App\Models\Localable;
use App\Models\Locale;

class Attribute extends Localable
{
    protected $fillable = [
        'attribute_group_id',
        'sort_order',
    ];

    private $localable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(AttributeGroup::class, 'attribute_group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function locales()
    {
        return $this->morphMany(Locale::class, 'localable');
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
