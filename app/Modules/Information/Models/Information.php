<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 19.03.19
 * Time: 11:52
 */

namespace App\Modules\Information\Models;

use App\Models\Localable;

class Information extends Localable
{
    protected $fillable = [
        'status',
        'sort_order',
        'layout_id',
    ];
    private $localable = [
        'title',
        'description',
        'meta_tag_title',
    ];

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
