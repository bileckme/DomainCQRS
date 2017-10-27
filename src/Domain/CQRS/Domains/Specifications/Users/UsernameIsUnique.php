<?php namespace Domain\CQRS\Domains\Specifications\Users;

use Domain\CQRS\Domains\Model\Users\Username;

/**
 * Class UsernameIsUnique
 * @package Domain\CQRS\Domains\Specifications
 */
class UsernameIsUnique
{
    /**
     * @param Username $username
     * @return bool
     */
    public function isSatisfiedBy(Username $username)
    {
        /**
         * The UsernameIsUnique Specification object can be implemented using whatever means necessary.
         * In this example you would likely inject a repository to query the database to check if the
         * username was indeed unique.
         *
         */
    }
}