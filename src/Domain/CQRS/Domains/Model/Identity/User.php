<?php namespace Domain\CQRS\Domains\Model\Identity;

use Domain\CQRS\Domains\AggregateRoot;
use Domain\CQRS\Domains\Event;
use Domain\CQRS\Events\UserHasRegistered;

/**
 * Class User
 * @package Domain\CQRS\Domains\Model\Identity
 */
class User implements AggregateRoot
{
    /**
     * @var UserId
     */
    private $userId;
    /**
     * @var Email
     */
    private $email;
    /**
     * @var Username
     */
    private $username;
    /**
     * @var HashedPassword
     */
    private $password;

    /**
     * Create a new User
     *
     * @param UserId $userId
     * @param Email $email
     * @param Username $username
     * @param HashedPassword $password
     * @return void
     */
    private function __construct(UserId $userId, Email $email, Username $username, HashedPassword $password)
    {
        $this->setId($userId);
        $this->setEmail($email);
        $this->setUsername($username);
        $this->setPassword($password);

        $this->record(new UserHasRegistered($this));
        $this->userId = $userId;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }


    function record(Event $event)
    {
        // TODO: Implement record() method.
    }
}