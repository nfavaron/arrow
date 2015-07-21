<?php

namespace Arrow\Event\Manager\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Event\Manager\EventManager;

/**
 * Class EventManagerFactory
 *
 * @package Arrow\Event\Service
 */
class EventManagerFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        $eventManager = new EventManager();

        $eventManager->setServiceLocator($serviceLocator);

        return $eventManager;

    }

}