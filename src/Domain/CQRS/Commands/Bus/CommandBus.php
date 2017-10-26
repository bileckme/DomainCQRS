<?php namespace Domain\CQRS\Commands\Bus;

use Domain\CQRS\Commands\Translators\CommandTranslator;
use Illuminate\Foundation\Application as Laravel;

/**
 * Class CommandBus
 * @package Domain\CQRS\Commands\Bus
 */
class CommandBus implements ICommandBus
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var CommandTranslator
     */
    protected $commandTranslator;

    /**
     * CommandBus constructor.
     *
     * @param Illuminate\Foundation\Application $app
     * @param CommandTranslator $commandTranslator
     */
    public function __construct(Laravel $app, CommandTranslator $commandTranslator)
    {
        $this->app = $app;
        $this->commandTranslator = $commandTranslator;
    }

    /**
     * Executes a command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        $handler = $this->commandTranslator->toCommandHandler($command);
        return $this->app->make($handler)->handle($command);
    }
}