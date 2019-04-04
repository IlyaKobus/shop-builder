<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 05.03.19
 * Time: 17:38
 */

namespace App\Modules\Customer\Models;

use App\Modules\Dashboard\Models\DashboardAuthenticatableAbstract;
use App\Modules\User\Models\PasswordAttribute;
use Illuminate\Auth\Authenticatable;

class Customer extends DashboardAuthenticatableAbstract implements \Illuminate\Contracts\Auth\Authenticatable
{
    use PasswordAttribute, Authenticatable;

    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'password',
        'phone',
        'avatar',
        'is_confirmed',
        'is_mailable',
        'status',
        'role',
        'customer_group_id',
    ];
    protected $hidden = [
        'password',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(CustomerGroup::class, 'customer_group_id');
    }

    public function getNameAttribute()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * @return mixed
     */
    public function defaultAddress()
    {
        return $this->addresses
            ->where('is_default', true)
            ->first();
    }

    /**
     * @param array|null $addresses
     * @return $this
     */
    public function updateAddresses(?array $addresses)
    {
        $this->addresses()->delete();

        if (!is_null($addresses)) {
            foreach ($addresses as $address) {
                $this->addresses()->create($address);
            }
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }
}