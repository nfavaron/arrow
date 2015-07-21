<?php

namespace Arrow\Http\Request\Strategy\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Http\Request\Strategy\Put;

/**
 * Class PutFactory
 *
 * @package Arrow\Http\Request\Strategy\Service
 */
class PutFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new Put();

    }

}