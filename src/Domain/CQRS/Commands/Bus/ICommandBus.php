<?php namespace Domain\CQRS\Commands\Bus;

/**
 * Interface ICommandBus
 * @package Domain\CQRS\Commands\Bus
 */
interface ICommandBus
{
    /**
     * @param $command
     * @return mixed
     */
    public function execute($command);
}