<?php

namespace Arrow\Event\Manager;

use Arrow\Service\Locator\ServiceLocatorAwareInterface;
use Arrow\Service\Locator\ServiceLocatorAwareTrait;
use Arrow\Event\Exception\EventException;
use Arrow\Event\EventInterface;

/**
 * Class EventManager
 *
 * @package Arrow\Event\Manager
 */
class EventManager implements EventManagerInterface, ServiceLocatorAwareInterface
{

    use ServiceLocatorAwareTrait;

    /**
     * Associative array of registered observers
     *
     * @var array
     */
    protected $observers = [];

    /**
     * @inheritdoc
     */
    public function on($eventName, $serviceName, $method)
    {

        // Attach event
        if (isset($this->observers[$eventName]) === false) {
            $this->observers[$eventName] = [];
        }

        // Attach observer
        $this->observers[$eventName][$serviceName] = $method;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function off($eventName, $serviceName)
    {

        // Has observer
        if (isset($this->observers[$eventName][$serviceName])) {

            // Detach observer
            unset($this->observers[$eventName][$serviceName]);

        }

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function trigger(EventInterface $event)
    {

        // Get event's name
        $eventName = $event->getName();

        // Reject event without name
        if (empty($eventName)) {

            throw new EventException('The event name is not defined.');
        }

        // Has observers
        if (isset($this->observers[$eventName])) {

            // Observer's services + methods attached to the event
            foreach ($this->observers[$eventName] as $serviceName => $method) {

                // Event can propagate
                if($event->getPropagation() === true) {

                    // Callback
                    call_user_func(
                        [$this->getServiceLocator()->get($serviceName), $method],
                        $event
                    );

                }

            }

        }

        return $this;

    }

}