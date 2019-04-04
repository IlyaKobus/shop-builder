<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 14:56
 */

namespace App\Modules\Customer\Models;

use App\Models\Localable;

class CustomerGroup extends Localable
{
    protected $fillable = [
        'is_should_approve',
        'sort_order',
    ];
    private $localable = [
        'name',
    ];

    /**
     * @return mixed
     */
    public static function getDefaultGroup()
    {
        return CustomerGroup::where('name', 'Default')->first() ?? CustomerGroup::first();
    }

    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
