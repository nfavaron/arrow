<?php

namespace Arrow\Observer;

use Arrow\Event\Manager\EventManagerAwareInterface;

/**
 * Interface ObserverManagerInterface
 *
 * @package Arrow\Observer
 */
interface ObserverManagerInterface
{

    /**
     * @param array $observers
     * @return $this
     */
    public function setObservers(array $observers);

    /**
     * Attach observers to the $instance identified by $serviceName
     *
     * @param string $serviceName
     * @param EventManagerAwareInterface $instance
     * @return $this
     */
    public function attachObservers($serviceName, EventManagerAwareInterface $instance);

}