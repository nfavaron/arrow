<?php

namespace Arrow\Application\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Application\Application;

/**
 * Class ApplicationFactory
 *
 * @package Arrow\Application\Service
 */
class ApplicationFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        $application = new Application();

        $application
            ->setEventManager($serviceLocator->get('event-manager'))
            ->setRouter($serviceLocator->get('router'))
            ->setRequest($serviceLocator->get('request'))
            ->setResponse($serviceLocator->get('response'));

        return $application;

    }

}