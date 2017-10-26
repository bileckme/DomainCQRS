<?php namespace Domain\CQRS\Domains;

use Ramsey\Uuid\Uuid;
use Domain\CQRS\Domains\Interfaces\Identifier;

/**
 * Class UuidIdentifier
 * @package Domain\CQRS\Domains
 */
class UuidIdentifier implements Identifier
{

    /**
     * Generate a new Identifier
     *
     * @return Identifier
     */
    public static function generate()
    {
        return new static(Uuid::uuid4());
    }

    /**
     * Creates an Identifier from a string
     *
     * @param $string
     * @return Identifier
     */
    public static function fromString($string)
    {
        return new static(Uuid::fromString($string));
    }

    /**
     * Determine equality with another Identifier
     *
     * @param Identifier $other
     * @return bool
     */
    public function equals(Identifier $other)
    {
        return $this == $other;
    }

    /**
     * Return the Identifier as a string
     *
     * @return string
     */
    public function toString()
    {
        return $this->value->toString();
    }

    /**
     * Return the identifier as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->value->toString();
    }
}