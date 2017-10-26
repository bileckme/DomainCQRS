<?php namespace Domain\CQRS\Commands\Handlers;

use Domain\CQRS\Events\EventDispatcher;
use Domain\CQRS\Events\Traits\EventGenerator;

/**
 * Class CommandHandler
 * @package Domain\CQRS\Commands\Handlers
 */
class CommandHandler implements ICommandHandler
{
    use EventGenerator;

    /**
     * @var EventDispatcher
     */
    protected $dispatcher;

    /**
     * CommandHandler constructor.
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }


    /**
     * Handle command
     *
     * @param $command
     * @return void
     */
    public function handle($command)
    {
        $this->performAction($command);
        $this->dispatcher->dispatch($this->releaseEvents());
    }

    /**
     * @param $command
     */
    protected function performAction($command)
    {

    }

}