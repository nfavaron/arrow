<?php

namespace Arrow\Routing\Strategy;

use Arrow\Routing\RouteInterface;
use Arrow\Http\Request\RequestInterface;

/**
 * Interface RoutingStrategyInterface
 *
 * @package Arrow\Routing\Strategy
 */
interface RoutingStrategyInterface
{

    /**
     * Returns true if the $request matches the routing strategy
     *
     * @param RouteInterface   $route
     * @param RequestInterface $request
     * @return bool
     */
    public function match(RouteInterface $route, RequestInterface $request);

}