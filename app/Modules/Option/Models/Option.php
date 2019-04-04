<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 12.03.19
 * Time: 11:47
 */

namespace App\Modules\Option\Models;

use App\Models\Localable;

class Option extends Localable
{
    protected $fillable = [
        'sort_order',
    ];

    private $localable = [
        'name',
    ];

    /**
     * @param array $files
     * @param array $data
     * @return $this
     */
    public function updateValues(array $files, array $data = [])
    {
        $valueIds = array_map(function ($value) {
            return $value['id'] ?? null;
        }, $data);

        $this->values()
            ->whereNotIn('id', $valueIds)
            ->delete();

        foreach ($data as $index => $val) {
            /** @var OptionValue $value */

            $value = $this->values()->updateOrCreate(
                [
                    'id' => $val['id'] ?? null,
                ],
                [
                    'sort_order' => $val['sort_order'],
                ]
            );

            $value->updateImage($files['values'][$index]['image'] ?? null)
                ->updateLocales($val['locales'])
                ->save();
        }

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany(OptionValue::class);
    }

    /**
     * @return array|mixed
     */
    protected function getLocalableFieldList()
    {
        return $this->localable;
    }
}
