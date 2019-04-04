<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 12:46
 */

namespace App\Modules\Extension\Models;

use App\Modules\Extension\Delegates\ModuleDelegateAbstract;
use App\Modules\Layout\Models\Layout;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'extension_id',
    ];

    protected $delegate;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extension()
    {
        return $this->belongsTo(Extension::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function layouts()
    {
        return $this->belongsToMany(Layout::class)
            ->withPivot('type')
            ->as('block');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(ModuleOption::class);
    }

    /**
     * @return array
     */
    public function view()
    {
        return $this->getDelegate()->view();
    }

    /**
     * @return mixed
     */
    protected function getDelegate()
    {
        if ($this->delegate) {
            return $this->delegate;
        }

        $this->delegate = ModuleDelegateAbstract::factory($this->extension->name);

        return $this->delegate;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getOption(string $name)
    {
        return $this->options
            ->where('name', $name)
            ->first()
            ->value;
    }

    /**
     * @param array|null $options
     * @return $this
     */
    public function updateOptions(?array $options = null)
    {
        $this->getDelegate()->saveOptions($options);
        return $this;
    }
}
