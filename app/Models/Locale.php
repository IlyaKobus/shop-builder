<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 12:38
 */

namespace App\Models;

use App\Modules\Language\Models\Language;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    public $table = 'translations';

    protected $fillable = [
        'language_code',
        'key',
        'value',
        'localable_id',
        'localable_type',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function localable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_code');
    }
}
