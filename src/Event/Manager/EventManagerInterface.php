<?php

namespace Arrow\Event\Manager;

use Arrow\Event\EventInterface;
use Arrow\Event\Exception\EventException;

/**
 * Interface EventManagerInterface
 *
 * @package Arrow\Event\Manager
 */
interface EventManagerInterface
{

    /**
     * Attaches an observer $eventName of $serviceName
     *
     * @param string $eventName
     * @param string $serviceName Service locator key of the observer
     * @param string $method      Method of the observer
     * @return $this
     * @throws EventException
     */
    public function on($eventName, $serviceName, $method);

    /**
     * Detaches the observer $eventName of $serviceName
     *
     * @param $eventName
     * @param $serviceName
     * @return mixed
     */
    public function off($eventName, $serviceName);

    /**
     * Triggers $event
     *
     * @param EventInterface $event
     * @return $this
     * @throws EventException
     */
    public function trigger(EventInterface $event);

}