<?php namespace Domain\CQRS\Events\Traits;

/**
 * Trait EventGenerator
 * @package Domain\CQRS\Events\Traits
 */
trait EventGenerator
{
    protected $pendingEvents = [];

  /**
   * Raise the event
   *
   * @param $event
   */
  public function raise($event)
  {
      $this->pendingEvents[] = $event;
  }

  /**
   * Release the events
   *
   * @return array
   */
  public function releaseEvents()
  {
      $events = $this->pendingEvents;

      $this->pendingEvents = [];

      return $events;
  }
}
