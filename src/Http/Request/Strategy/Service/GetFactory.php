<?php

namespace Arrow\Http\Request\Strategy\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Http\Request\Strategy\Get;

/**
 * Class GetFactory
 *
 * @package Arrow\Http\Request\Strategy\Service
 */
class GetFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new Get();

    }

}