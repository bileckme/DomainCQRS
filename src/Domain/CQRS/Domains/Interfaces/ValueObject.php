<?php namespace Domain\CQRS\Domains\ValueObjects;

/**
 * Interface ValueObject
 * @package Domain\CQRS\Domains\ValueObjects
 */
interface ValueObject
{
    /**
     * Create a new instance from a native form
     *
     * @param mixed $native
     * @return ValueObject
     */
    public static function fromNative($native);

    /**
     * Determine equality with another Value Object
     *
     * @param ValueObject $object
     * @return bool
     */
    public function equals(ValueObject $object);
}