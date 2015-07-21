<?php

namespace Arrow\Observer;

use Arrow\Event\Manager\EventManagerAwareInterface;

/**
 * Class ObserverManager
 *
 * @package Arrow\Observer
 */
class ObserverManager implements ObserverManagerInterface
{

    /**
     * @var array
     */
    protected $observers = [];

    /**
     * @inheritdoc
     */
    public function setObservers(array $observers)
    {

        $this->observers = $observers;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function attachObservers($serviceName, EventManagerAwareInterface $instance) {

        // Instance's event manager
        $eventManager = $instance->getEventManager();

        // Service has observers
        if (isset($this->observers[$serviceName])) {

            // Get events
            $events = $this->observers[$serviceName];

            // For each event
            foreach ($events as $eventName => $observers) {

                // For each observer of this event
                foreach ($observers as $serviceName => $method) {

                    // Add observer
                    $eventManager->on(
                        $eventName,
                        $serviceName,
                        $method
                    );

                }

            }

        }

        return $this;

    }

}