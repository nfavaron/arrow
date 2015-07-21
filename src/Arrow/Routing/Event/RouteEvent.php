<?php

namespace Arrow\Routing\Event;

use Arrow\Event\Event;
use Arrow\Routing\RouteInterface;

/**
 * Class RouteEvent
 *
 * @package Arrow\Routing\Event
 */
class RouteEvent extends Event
{

    const FOUND = 'found';

    const NOT_FOUND = 'not-found';

    /**
     * @var RouteInterface
     */
    protected $route;

    /**
     * @param RouteInterface $route
     * @return $this
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * @return \Arrow\Routing\RouteInterface
     */
    public function getRoute()
    {
        return $this->route;
    }

}