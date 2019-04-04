<?php
/**
 * Created by PhpStorm.
 * User: iliya
 * Date: 20.03.2019
 * Time: 14:51
 */

namespace App\Modules\Extension\Delegates;

use App\Modules\Extension\Models\Module;

/**
 * Class ModuleDelegateAbstract
 * @package App\Modules\Extension\Delegates
 *
 * Delegates could be used for implementing extraordinary extension logic.
 * It always called from Module.php model class to implementing visitor pattern
 */
abstract class ModuleDelegateAbstract
{
    const DELEGATES_LIST = [
        'Select' => HardOptionedModuleDelegate::class,
    ];

    /** @var Module */
    protected $module;

    /**
     * @param string $extensionName
     * @return mixed
     */
    public static function factory(string $extensionName)
    {
        $class = self::DELEGATES_LIST[$extensionName] ?? DefaultModuleDelegate::class;
        return new $class();
    }

    /**
     * @return array
     */
    public function getOptionsList()
    {
        return $this->options ?? [];
    }

    /**
     * @return Module
     */
    public function getModule(): Module
    {
        return $this->module;
    }

    /**
     * @param Module $module
     * @return $this
     */
    public function setModule(Module $module)
    {
        $this->module = $module;
        return $this;
    }

    /**
     * @param array|null $options
     * @return mixed
     */
    abstract public function saveOptions(?array $options);

    /**
     * @return array
     */
    abstract public function view(): array;
}
