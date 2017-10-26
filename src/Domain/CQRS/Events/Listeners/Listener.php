<?php namespace Domain\CQRS\Events\Listeners;

use Domain\CQRS\Events\Event;

/**
 * Interface Listener
 * @package Domain\CQRS\Events\Listeners
 */
interface Listener
{
    /**
     * Handle the Event
     *
     * @param $event
     * @return void
     */
    public function handle($event);
}