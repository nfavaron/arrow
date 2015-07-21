<?php

namespace Arrow\Routing\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Routing\Router;
use Arrow\Routing\RouteInterface;
use Arrow\Config\ConfigManagerInterface;

/**
 * Class RouterFactory
 *
 * @package Arrow\Routing\Service
 */
class RouterFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        /**
         * @var ConfigManagerInterface $configManager
         * @var array                  $routes
         */
        $configManager = $serviceLocator->get('config-manager');
        $routes        = $configManager->get('routes');

        // Instantiate router
        $router = new Router();
        $router
            ->setEventManager($serviceLocator->get('event-manager'))
            ->setRoutingStrategy($serviceLocator->get('routing-strategy'));

        // For each route
        foreach ($routes as $routeName => $routeConfig) {

            /**
             * @var RouteInterface $route
             */
            $route = $serviceLocator->get('route');

            $route
                ->setName($routeName)
                ->setMethod($routeConfig['method'])
                ->setUri($routeConfig['uri'])
                ->setParams($routeConfig['params']);

            $router->addRoute($route);

        }

        return $router;

    }

}