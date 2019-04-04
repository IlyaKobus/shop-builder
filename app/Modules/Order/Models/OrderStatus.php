<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 25.03.2019
 * Time: 15:03
 */

namespace App\Modules\Order\Models;

use App\Models\Localable;

class OrderStatus extends Localable
{
    protected $fillable = [
        '',
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

