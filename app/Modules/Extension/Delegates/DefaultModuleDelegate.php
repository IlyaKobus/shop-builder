<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 21.03.19
 * Time: 13:04
 */

namespace App\Modules\Extension\Delegates;

/**
 * This default delegate class knows how to save scalar values to DB and return simply view without parameters
 *
 * Class DefaultModuleDelegate
 * @package App\Modules\Extension\Delegates
 */
class DefaultModuleDelegate extends ModuleDelegateAbstract
{
    /**
     * @param array $options
     * @return $this|ModuleDelegateAbstract
     */
    public function saveOptions(?array $options)
    {
        if (!is_null($options)) {
            foreach ($options as $name => $value) {
                if (is_scalar($value)) {
                    $this->getModule()->options()->updateOrCreate([
                        'name' => $name
                    ], [
                        'value' => $value,
                    ]);
                }
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function view(): array
    {
        return $this->getModule()->view();
    }
}
