<?php namespace Domain\CQRS\Commands\Handlers;

/**
 * Interface ICommandHandler
 * @package Domain\CQRS\Commands\Handlers
 */
interface ICommandHandler
{
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command);
}