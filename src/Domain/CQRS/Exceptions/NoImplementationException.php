<?php namespace Domain\CQRS\Exceptions;

use Exception;

/**
 * Class NoImplementationException
 * @package Domain\CQRS\Exceptions
 */
class NoImplementationException extends Exception
{
    /**
     * NoImplementationException constructor.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }


}