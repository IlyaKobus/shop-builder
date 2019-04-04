<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 12:47
 */

namespace App\Modules\Extension\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleOption extends Model
{
    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extension()
    {
        return $this->belongsTo(Extension::class);
    }
}
