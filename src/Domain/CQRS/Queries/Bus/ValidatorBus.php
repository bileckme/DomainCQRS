<?php namespace Domain\CQRS\Queries\Bus;

use Domain\CQRS\Exceptions\ValidatorException;
use Domain\CQRS\Queries\Bus\QueryBus as Bus;
use Domain\CQRS\Queries\Query;
use Domain\CQRS\Queries\Translators\QueryTranslator as Translator;
use Illuminate\Foundation\Application as Laravel;
use Illuminate\Validation\Validator;

/**
 * Class ValidatorBus
 * @package Domain\CQRS\Queries\Bus
 */
class ValidatorBus extends Bus
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
     * @var Bus
     */
    private $bus;

    /**
     * ValidatorBus constructor.
     *
     * @param Laravel     $app
     * @param Bus         $bus
     * @param Translator  $translator
     */
    public function __construct(Laravel $app, Bus $bus, Translator $translator)
    {
        $this->app        = $app;
        $this->bus        = $bus;
        $this->translator = $translator;
    }


    /**
     * Execute a query
     *
     * @param Query $query
     * @return array
     * @throws ValidatorException
     */
    public function execute(Query $query)
    {
        $validator = $this->translator->toQueryValidator($query);

        if (class_exists($validator)) {
            /** @var Validator $validation */
            $validation = $this->app->make($validator)->validate($query->toArray());

            if ($validation->fails()) {
                throw new ValidatorException($validation->getMessageBag());
            }
        }

        return $this->bus->execute($query);
    }
}