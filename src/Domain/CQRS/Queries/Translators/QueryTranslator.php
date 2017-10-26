<?php namespace Domain\CQRS\Queries\Translators;

use Domain\CQRS\Exceptions\UnregisteredHandlerException;
use Domain\CQRS\Queries\Query;

/**
 * Class QueryTranslator
 * @package Domain\CQRS\Queries\Translators
 */
class QueryTranslator
{
    /**
     * @param $query
     * @return mixed
     * @throws UnregisteredHandlerException
     */
    public function toQueryHandler($query)
    {
        $queryClass = get_class($query);
        $handler = substr_replace($queryClass, 'QueryHandler', strrpos($queryClass, 'Query'));

        if (!class_exists($handler)) {
            $message = "Query handler [$handler] does not exist.";
            throw new UnregisteredHandlerException($message);
        }
        return $handler;
    }

    /**
     * @param Query $query
     * @return mixed
     */
    public function toQueryValidator(Query $query)
    {
        return str_replace('Query', 'Validator', get_class($query));
    }
}