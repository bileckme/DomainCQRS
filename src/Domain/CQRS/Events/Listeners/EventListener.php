<?php namespace Domain\CQRS\Events\Listeners;

use Illuminate\Foundation\Application;
use ReflectionClass;

/**
 * @package Domain\CQRS\Events\Listeners
 */
abstract class EventListener implements Listener
{
    protected $app;

    /**
     * EventListener constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app           = $app;
    }


    /**
     * @param $event
     *
     * @return mixed
     */
    public function handle($event)
    {
        $eventName = $this->getEventName($event);

        if ($this->listenerIsRegistered($eventName)) {
            return call_user_func([$this, sprintf('when%s', $eventName)], $event);
        }
    }

    /**
     * @param $event
     *
     * @return string
     */
    private function getEventName($event)
    {
        return (new ReflectionClass($event))->getShortName();
    }

    /**
     * @param $eventName
     *
     * @return bool
     */
    private function listenerIsRegistered($eventName)
    {
        $method = "when{$eventName}";

        return method_exists($this, $method);
    }
}