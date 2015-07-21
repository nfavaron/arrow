<?php

namespace Arrow\Routing;

use Arrow\Http\Request\RequestInterface;
use Arrow\Routing\Exception\RoutingException;
use Arrow\Routing\Strategy\RoutingStrategyInterface;

/**
 * Interface RouterInterface
 *
 * @package Arrow\Routing
 */
interface RouterInterface
{

    /**
     * Sets the routing strategy that will match a Route to a Request
     *
     * @param RoutingStrategyInterface $routingStrategy
     * @return $this
     */
    public function setRoutingStrategy(RoutingStrategyInterface $routingStrategy);

    /**
     * @return RoutingStrategyInterface
     * @throws Exception\RoutingException
     */
    public function getRoutingStrategy();

    /**
     * Add a route to the router.
     * Throws an exception if the route name is already registered.
     *
     * @param RouteInterface
     * @return $this
     * @throws RoutingException
     */
    public function addRoute(RouteInterface $route);

    /**
     * Returns the route registered under $routeName.
     *
     * @param string $routeName
     * @return RouteInterface
     * @throws RoutingException
     */
    public function getRoute($routeName);

    /**
     * Check registered routes against the $request.
     * Triggers an event if a route match is found or not.
     *
     * @param RequestInterface $request
     * @return $this
     */
    public function dispatch(RequestInterface $request);

}