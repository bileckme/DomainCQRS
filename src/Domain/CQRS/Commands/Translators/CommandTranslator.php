<?php namespace Domain\CQRS\Commands\Translators;

use Domain\CQRS\Exceptions\UnregisteredHandlerException;

/**
 * Class CommandTranslator
 * @package Domain\CQRS\Commands\Translators
 */
class CommandTranslator implements ICommandTranslator
{
    /**
     * @throws UnregisteredHandlerException
     * @param $command
     * @return mixed
     */
    public function toCommandHandler($command)
    {
        $commandClass = get_class($command);
        $handler = substr_replace($commandClass, 'CommandHandler', strrpos($commandClass, 'Command'));

        if (!class_exists($handler)) {
            $message = "Command handler [$handler] does not exist.";
            throw new UnregisteredHandlerException($message);
        }
        return $handler;
    }
}