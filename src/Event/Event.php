<?php

namespace Arrow\Event;

/**
 * Class Event
 *
 * @package Arrow\Event
 */
class Event implements EventInterface
{

    /**
     * Event's name
     *
     * @var string
     */
    protected $name;

    /**
     * Allow (true) or prevent (false) the event to continue its
     * propagation across the remaining observers.
     *
     * @var bool
     */
    protected $propagation = true;

    /**
     * @inheritdoc
     */
    public function setName($name)
    {

        $this->name = $name;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {

        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function stopPropagation() {

        $this->propagation = false;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPropagation() {

        return $this->propagation;
    }

}