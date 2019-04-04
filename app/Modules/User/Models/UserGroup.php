<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 29.03.2019
 * Time: 12:51
 */

namespace App\Modules\User\Models;

use App\Modules\User\Enums\ModelActionEnum;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'user_group_id');
    }

    /**
     * @param array $permissions
     * @return $this
     */
    public function updatePermissions(array $permissions)
    {
        $this->permissions()->delete();

        foreach ($permissions as $model) {
            $this->permissions()->create([
                'model' => $model['name'],
                'is_read_permitted' => $model['actions'][ModelActionEnum::READ] ?? false,
                'is_create_permitted' => $model['actions'][ModelActionEnum::CREATE] ?? false,
                'is_update_permitted' => $model['actions'][ModelActionEnum::UPDATE] ?? false,
                'is_delete_permitted' => $model['actions'][ModelActionEnum::DELETE] ?? false,
            ]);
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(UserGroupPermissions::class, 'user_group_id');
    }
}
