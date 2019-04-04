<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 12:53
 */

namespace App\Modules\Payment\Models;

use App\Models\Localable;

class Payment extends Localable
{
    protected $fillable = [
        'status',
        'sort_order',
    ];
    private $localable = [
        'name',
    ];

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
