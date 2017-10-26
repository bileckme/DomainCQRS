<?php namespace Domain\CQRS\Exceptions;

use Exception;
use Throwable;

/**
 * Class UnregisteredHandlerException
 * @package Domain\CQRS\Exceptions
 */
class UnregisteredHandlerException extends Exception
{
    /**
     * UnregisteredHandlerException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->setMessage($message);
        parent::__construct($message, $code, $previous);
    }

    /**
     * Sets the message
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}