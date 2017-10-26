<?php namespace Domain\CQRS\Events;

use Domain\CQRS\Domains\Model\Identity\User;

/**
 * Class UserHasRegistered
 * @package Domain\CQRS\Events
 */
class UserHasRegistered extends EventDispatcher
{
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new UserHasRegistered event
     *
     * @param User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}