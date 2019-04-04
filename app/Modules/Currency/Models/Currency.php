<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 11:27
 */

namespace App\Modules\Currency\Models;

use App\Models\Localable;

class Currency extends Localable
{
    protected $fillable = [
        'code',
        'prefix',
        'postfix',
        'is_default',
        'value',
    ];
    private $localable = [
        'name',
    ];

    /**
     * @return mixed
     */
    public static function getDefaultCurrency()
    {
        return self::where('is_default', true)->first() ?? self::where('value', 1)->first() ?? self::all()->first();
    }

    /**
     * @param $value
     */
    public function setIsDefaultAttribute($value)
    {
        if ($value) {
            self::where('is_default', true)->update([
                'is_default' => false,
            ]);
        }

        $this->attributes['is_default'] = $value;
    }

    /**
     * @param $value
     * @return int
     */
    public function getValueAttribute($value)
    {
        if ($this->is_default) {
            return 1;
        }

        return $value;
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
