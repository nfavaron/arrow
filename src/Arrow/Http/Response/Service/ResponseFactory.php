<?php

namespace Arrow\Http\Response\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Http\Response\Response;

/**
 * Class ResponseFactory
 *
 * @package Arrow\Http\Response\Service
 */
class ResponseFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new Response();

    }

}