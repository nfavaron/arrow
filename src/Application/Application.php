<?php

namespace Arrow\Application;

use Arrow\Application\Event\ExceptionEvent;
use Arrow\Routing\RouterInterface;
use Arrow\Http\Request\RequestAwareInterface;
use Arrow\Http\Request\RequestAwareTrait;
use Arrow\Http\Response\ResponseAwareInterface;
use Arrow\Http\Response\ResponseAwareTrait;
use Arrow\Application\Exception\ApplicationException;
use Arrow\Event\Manager\EventManagerAwareInterface;
use Arrow\Event\Manager\EventManagerAwareTrait;
use Exception;

/**
 * Class Application
 *
 * @package Arrow\Application
 */
class Application implements ApplicationInterface, EventManagerAwareInterface, RequestAwareInterface, ResponseAwareInterface
{

    use EventManagerAwareTrait, RequestAwareTrait, ResponseAwareTrait;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @inheritdoc
     */
    public function setRouter(RouterInterface $router)
    {

        $this->router = $router;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getRouter()
    {

        if (empty($this->router)) {
            throw new ApplicationException('The router is not defined.');
        }

        return $this->router;
    }

    /**
     * Runs the application
     *
     * @return $this
     */
    public function run()
    {

        try {

            // Dispatch the request using the router
            $this->getRouter()->dispatch($this->getRequest());

        } catch(Exception $exception) {

            // Create event
            $event = new ExceptionEvent();
            $event
                ->setName(ExceptionEvent::EXCEPTION)
                ->setException($exception);

            // Trigger event
            $this
                ->getEventManager()
                ->trigger($event);

        }

        // Send response
        $this
            ->getResponse()
            ->sendHeaders()
            ->sendContent();

        return $this;
        
    }

}