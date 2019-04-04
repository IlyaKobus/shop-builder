<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 05.03.19
 * Time: 17:37
 */

namespace App\Modules\User\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as IAuthenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements IAuthenticatable
{
    use PasswordAttribute, AvatarAttribute, Authenticatable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'user_group_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }
}