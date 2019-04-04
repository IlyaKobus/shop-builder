<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 01.04.2019
 * Time: 13:16
 */

namespace App\Modules\Page\Models;

use App\Models\Localable;

class Page extends Localable
{
    protected $fillable = [
        'view',
    ];

    private $localable = [
        'slug',
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
