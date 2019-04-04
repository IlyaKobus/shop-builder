<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 22.03.19
 * Time: 13:57
 */

namespace App\Modules\Shipment\Models;

use App\Models\Localable;

class Shipment extends Localable
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
