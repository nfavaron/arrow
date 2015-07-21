<?php

namespace Arrow\Routing;

use Arrow\Http\Request\RequestInterface;
use Arrow\Routing\Exception\RoutingException;
use Arrow\Event\Manager\EventManagerAwareInterface;
use Arrow\Event\Manager\EventManagerAwareTrait;
use Arrow\Routing\Event\RouteEvent;
use Arrow\Routing\Strategy\RoutingStrategyInterface;

/**
 * Class Router
 *
 * @package Arrow\Routing
 */
class Router implements RouterInterface, EventManagerAwareInterface
{

    use EventManagerAwareTrait;

    /**
     * Reserved route names by the framework
     *
     * @var array
     */
    protected $reserved = [
        RouteEvent::FOUND,
        RouteEvent::NOT_FOUND
    ];

    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @var RoutingStrategyInterface
     */
    protected $routingStrategy;

    /**
     * @inheritdoc
     */
    public function setRoutingStrategy(RoutingStrategyInterface $routingStrategy) {

        $this->routingStrategy = $routingStrategy;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getRoutingStrategy()
    {

        if (empty($this->routingStrategy)) {
            throw new RoutingException('The routing strategy is not defined.');
        }

        return $this->routingStrategy;
    }

    /**
     * @inheritdoc
     */
    public function addRoute(RouteInterface $route)
    {

        $routeName = $route->getName();

        // Reserved route name
        if ($this->isReserved($routeName)) {

            throw new RoutingException(
                sprintf(
                    'The route name "%s" is reserved by the framework.',
                    $routeName
                )
            );

        }

        // Check if route name is already registered
        if (isset($this->routes[$route->getName()])) {

            throw new RoutingException(
                sprintf(
                    'The route name "%s" is already registered.',
                    $routeName
                )
            );

        }

        // Register route
        $this->routes[$routeName] = $route;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getRoute($routeName)
    {

        // Route not defined
        if (!isset($this->routes[$routeName])) {

            throw new RoutingException(sprintf(
                'The route "%s" is not registered.',
                $routeName
            ));
        }

        return $this->routes[$routeName];

    }

    /**
     * @inheritdoc
     */
    public function dispatch(RequestInterface $request)
    {

        /**
         * @var null|RouteInterface      $routeMatch
         * @var RoutingStrategyInterface $routingStrategy
         * @var array                    $routes
         * @var int                      $i
         */
        $routeMatch      = null;
        $routingStrategy = $this->getRoutingStrategy();
        $routes          = array_keys($this->routes);
        $i               = 0;

        // While no route match found and more routes to test
        while ($routeMatch instanceof RouteInterface === false && isset($routes[$i])) {

            /**
             * @var RouteInterface $route
             */
            $route = $this->getRoute($routes[$i]);

            // Match the route and the request
            if ($routingStrategy->match($route, $request)) {

                // Match found
                $routeMatch = $route;

            }

            $i++;

        }

        // Create "route found" event
        $event = new RouteEvent();

        // Route found
        if ($routeMatch instanceof RouteInterface) {

            $event
                ->setName(RouteEvent::FOUND)
                ->setRoute($routeMatch);

            $event
                ->setName($routeMatch->getName())
                ->setRoute($routeMatch);

            // Route not found
        } else {

            $event->setName(RouteEvent::NOT_FOUND);

        }

        // Trigger event
        $this->getEventManager()->trigger($event);

        return $this;

    }

    /**
     * Returns true if the $routeName is reserved by the framework
     *
     * @param string $routeName
     * @return bool
     */
    protected function isReserved($routeName)
    {

        return in_array($routeName, $this->reserved);

    }

}