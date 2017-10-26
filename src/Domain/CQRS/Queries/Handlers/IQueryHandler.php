<?php namespace Domain\CQRS\Queries\Handlers;

/**
 * Interface IQueryHandler
 * @package Domain\CQRS\Queries\Handlers
 */
interface IQueryHandler
{
    /**
     * Handle the query
     *
     * @param $query
     * @return mixed
     */
    public function handle($query);
}