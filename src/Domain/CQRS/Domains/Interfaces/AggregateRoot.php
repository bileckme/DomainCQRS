<?php namespace Domain\CQRS\Domains;

/**
 * Class AggregateRoot
 * @package domain\cqrs\src\Domain\CQRS\Domains
 */
interface AggregateRoot
{
    function record(Event $event);
}