<?php namespace Domain\Api\ValueObjects;

/**
 * Class ValueObject
 * @package Domain\Api\ValueObjects
 */
abstract class ValueObject
{
    /**
     * @var
     */
    private $value;

    /**
     * @return mixed
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Return the object as a string
     *
     * @return string
     */
    abstract public function __toString();
}