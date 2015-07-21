<?php

namespace Arrow\Http\Request\Strategy\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Http\Request\Strategy\Delete;

/**
 * Class DeleteFactory
 *
 * @package Arrow\Http\Request\Strategy\Service
 */
class DeleteFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new Delete();

    }

}