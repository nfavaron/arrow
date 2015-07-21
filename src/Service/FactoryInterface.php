<?php

namespace Arrow\Service;

use Arrow\Service\Locator\ServiceLocatorInterface;

/**
 * Interface FactoryInterface
 *
 * @package Arrow\Service
 */
interface FactoryInterface
{

    /**
     * Creates a new instance and returns it.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    static public function create(ServiceLocatorInterface $serviceLocator);

}