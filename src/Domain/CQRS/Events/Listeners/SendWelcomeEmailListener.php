<?php namespace Domain\CQRS\Events\Listeners;

use Illuminate\Foundation\Application;
use Domain\CQRS\Events\UserHasRegistered;
use Domain\CQRS\Exceptions\NoImplementationException;
use Illuminate\Mail\Mailer;

/**
 * Class SendWelcomeEmailListener
 * @package Domain\CQRS\Events\Listeners
 */
class SendWelcomeEmailListener extends EventListener
{

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * SendWelcomeEmailListener constructor.
     * @param Application $app
     * @param Mailer $mailer
     */
    public function __construct(Application $app, Mailer $mailer)
    {
        $this->mailer = $mailer;
        parent::__construct($app);
    }

    /**
     * @param UserHasRegistered $event
     * @throws NoImplementationException
     */
    public function whenUserHasRegistered(UserHasRegistered $event)
    {
        throw new NoImplementationException('Event '.get_class($event).' has not been implemented');
    }
}