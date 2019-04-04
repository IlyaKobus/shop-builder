<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 14:37
 */

namespace App\Modules\Language\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'name',
        'code',
    ];
    protected $primaryKey = 'code';
}
