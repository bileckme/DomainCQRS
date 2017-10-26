<?php namespace Domain\CQRS\Queries\Bus;

use Domain\CQRS\Queries\Query;
use Domain\CQRS\Queries\Translators\QueryTranslator;
use Illuminate\Foundation\Application as Laravel;
use Illuminate\Support\Contracts\ArrayableInterface;

/**
 * Class QueryBus
 * @package Domain\CQRS\Queries\Bus
 */
class QueryBus extends ArrayableInterface implements IQueryBus
{

    /**
     * @var Application
     */
    private $app;

    /**
     * @var Translator
     */
    private $translator;

    /**
     * Bus constructor.
     *
     * @param Illuminate\Foundation\Application $app
     * @param Translator  $translator
     */
    public function __construct(Laravel $app, QueryTranslator $translator)
    {
        $this->app        = $app;
        $this->translator = $translator;
    }


    /**
     * Execute a query
     *
     * @param Query $query
     * @return array
     */
    public function execute(Query $query)
    {
        $handler = $this->translator->toQueryHandler($query);

        return $this->app->make($handler)->handle($query);
    }
}