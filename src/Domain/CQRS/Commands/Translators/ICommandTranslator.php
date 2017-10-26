<?php namespace Domain\CQRS\Commands\Translators;

/**
 * Interface ICommandTranslator
 * @package Domain\CQRS\Commands\Translators
 */
interface ICommandTranslator
{
    /**
     * Translate a command to its handler counterpart.
     * @param $command
     * @return mixed
     */
    public function toCommandHandler($command);
}