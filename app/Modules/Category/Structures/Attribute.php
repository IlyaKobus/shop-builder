<?php
/**
 * Created by PhpStorm.
 * User: iliyakobus
 * Date: 11.03.19
 * Time: 11:55
 */

namespace App\Modules\Category\Structures;

class Attribute implements \JsonSerializable
{
    /** @var string */
    protected $type;

    /** @var string */
    protected $name;

    /**
     * Attribute constructor.
     * @param string $type
     * @param string $name
     */
    public function __construct(string $type, string $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
        ];
    }
}
