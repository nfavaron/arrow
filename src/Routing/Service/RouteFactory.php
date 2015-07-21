<?php

namespace Arrow\Routing\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Routing\Route;

/**
 * Class RouteFactory
 *
 * @package Arrow\Routing\Service
 */
class RouteFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new Route();

    }

}