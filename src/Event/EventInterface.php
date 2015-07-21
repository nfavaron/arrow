<?php

namespace Arrow\Event;

use Arrow\Event\Exception\EventException;

/**
 * Interface EventInterface
 *
 * @package Arrow\Event
 */
interface EventInterface
{

    /**
     * Sets the event's name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     * @throws EventException
     */
    public function getName();

    /**
     * Prevent the event further propagation
     *
     * @return $this
     */
    public function stopPropagation();

    /**
     * Returns the propagation value
     *
     * @returns bool
     */
    public function getPropagation();

}