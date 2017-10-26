<?php namespace Domain\CQRS\Events;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;

/**
 * Class EventDispatcher
 * @package Domain\CQRS\Events
 */
class EventDispatcher implements Event
{
    protected $event;

    /**
     * EventDispatcher constructor.
     * @param Dispatcher $event
     */
  public function __construct(Dispatcher $event)
  {
      $this->event = $event;
  }


  /**
   * Dispatch events
   *
   * @param array $events
   */
  public function dispatch(array $events)
  {
      foreach ($events as $event) {
          $eventName = $this->getEventName($event);
          $this->event->fire($eventName, $event);
          Log::info("$eventName was fired.");
      }
  }

  /**
   * Get the event name
   *
   * @param $event
   * @return mixed
   */
  private function getEventName($event)
  {
      return str_replace('\\', '.', get_class($event));
  }
}
