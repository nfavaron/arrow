<?php

namespace Arrow\Routing\Strategy\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Routing\Strategy\Http;

/**
 * Class HttpFactory
 *
 * @package Arrow\Routing\Strategy\Service
 */
class HttpFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {
        return new Http();
    }

}