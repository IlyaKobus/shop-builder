<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 12:46
 */

namespace App\Modules\Extension\Models;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $fillable = [
        'name',
        'status',
    ];

    // You should to create 2 blade templates for new extension in Extension\Resources\views\dashboard\extension\instances\extension_name
    // named 'options' and 'show' (in order for rendering options on the module edit page and for front-end extension representation)

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
