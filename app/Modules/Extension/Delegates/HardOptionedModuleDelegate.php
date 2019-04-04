<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 14:50
 */

namespace App\Modules\Extension\Delegates;

class HardOptionedModuleDelegate extends DefaultModuleDelegate
{
    protected $options = [
        'manufacturers',
    ];

    /**
     * @param array|null $options
     * @return $this|DefaultModuleDelegate|ModuleDelegateAbstract
     */
    public function saveOptions(?array $options)
    {
        parent::saveOptions($options);

        $this->module->options()->updateOrCreate(
            [
                'name' => 'manufacturers',
            ],
            [
                'value' => join(',', $options['manufacturers']),
            ]);

        return $this;
    }

    public function view(): array
    {
        // TODO: Implement view() method.
    }
}
