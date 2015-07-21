<?php

namespace Arrow\Event\Manager;

use Arrow\Event\Exception\EventException;

/**
 * Class EventManagerAwareTrait
 *
 * @package Arrow\Event\Manager
 */
trait EventManagerAwareTrait
{

    /**
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * @inheritdoc
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEventManager()
    {

        if ($this->eventManager instanceof EventManagerInterface === false) {

            throw new EventException('The event manager is not defined.');

        }

        return $this->eventManager;
    }

}