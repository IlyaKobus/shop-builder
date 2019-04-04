<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 13:41
 */

namespace App\Modules\Layout\Models;

use App\Modules\Extension\Models\Module;
use App\Modules\Layout\Enums\ContentTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $fillable = [
        'name',
    ];

    public function updateModules(?array $modules = null)
    {
        $this->modules()->detach();

        if (!is_null($modules)) {
            foreach ($modules as $type => $moduleList) {
                $ids = array_map(function ($module) {
                    return $module['id'];
                }, $moduleList);

                foreach ($moduleList as $module) {
                    /** @var Module $module */
                    $this->modules()->attach([$module['id'] => ['type' => $type]]);
                }
            }
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class)
            ->withPivot('type')
            ->as('block');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function columnRight()
    {
        return $this->belongsToMany(Module::class)
            ->wherePivot('type', ContentTypeEnum::RIGHT);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function columnLeft()
    {
        return $this->belongsToMany(Module::class)
            ->wherePivot('type', ContentTypeEnum::LEFT);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contentTop()
    {
        return $this->belongsToMany(Module::class)
            ->wherePivot('type', ContentTypeEnum::TOP);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contentBottom()
    {
        return $this->belongsToMany(Module::class)
            ->wherePivot('type', ContentTypeEnum::BOTTOM);
    }
}
