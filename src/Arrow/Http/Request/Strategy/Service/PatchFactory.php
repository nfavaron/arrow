<?php

namespace Arrow\Http\Request\Strategy\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Http\Request\Strategy\Patch;

/**
 * Class PatchFactory
 *
 * @package Arrow\Http\Request\Strategy\Service
 */
class PatchFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new Patch();

    }

}