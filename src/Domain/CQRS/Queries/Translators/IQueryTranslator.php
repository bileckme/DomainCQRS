<?php namespace Domain\CQRS\Query\Translators;

/**
 * Interface IQueryTranslator
 * @package Domain\CQRS\Query\Translators
 */
interface IQueryTranslator
{
    /**
     * Translate a query to its handler counterpart.
     * @param $query
     * @return mixed
     */
    public function toQueryHandler($query);
}