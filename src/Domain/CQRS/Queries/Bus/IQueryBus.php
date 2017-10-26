<?php namespace Domain\CQRS\Queries\Bus;

use Domain\CQRS\Queries\Query;

/**
 * Interface IQueryBus
 * @package Domain\CQRS\Queries\Bus
 */
interface IQueryBus
{
    /**
     * Execute a query
     *
     * @param Query $query
     *
     * @return mixed
     */
    public function execute(Query $query);
}