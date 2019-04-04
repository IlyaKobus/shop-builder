<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 29.03.2019
 * Time: 12:54
 */

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroupPermissions extends Model
{
    protected $fillable = [
        'model',
        'is_read_permitted',
        'is_create_permitted',
        'is_update_permitted',
        'is_delete_permitted',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }
}
