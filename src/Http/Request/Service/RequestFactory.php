<?php

namespace Arrow\Http\Request\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Http\Request\Request;

/**
 * Class RequestFactory
 *
 * @package Arrow\Http\Service
 */
class RequestFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        $request = new Request();

        $method   = $request->getMethod();
        $strategy = sprintf('request-strategy-%s', strtolower($method));

        return $request->setStrategy($serviceLocator->get($strategy));

    }

}