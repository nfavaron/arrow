<?php

namespace Arrow\Event\Manager;

use Arrow\Event\Exception\EventException;

/**
 * Interface EventManagerAwareInterface
 *
 * @package Arrow\Event\Manager
 */
interface EventManagerAwareInterface
{

    /**
     * Sets the event manager
     *
     * @param EventManagerInterface $eventManager
     * @return $this
     */
    public function setEventManager(EventManagerInterface $eventManager);

    /**
     * Returns the event manager
     *
     * @return EventManagerInterface
     * @throws EventException
     */
    public function getEventManager();

}