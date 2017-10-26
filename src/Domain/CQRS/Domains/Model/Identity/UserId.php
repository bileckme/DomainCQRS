<?php namespace Domain\CQRS\Domains\Model\Identity;

use Ramsey\Uuid\Uuid;
use Domain\CQRS\Domains\Interfaces\Identifier;
use Domain\CQRS\Domains\UuidIdentifier;

/**
 * Class UserId
 * @package Domain\CQRS\Domains\Model\Identity
 */
class UserId extends UuidIdentifier implements Identifier
{
    /**
     * @var Uuid
     */
    protected $value;

    /**
     * Create a new UserId
     *
     * @return void
     */
    public function __construct(Uuid $value)
    {
        $this->value = $value;
    }
}