<?php

namespace Arrow\Observer\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Observer\ObserverManager;
use Arrow\Config\ConfigManagerInterface;

/**
 * Class ObserverManagerFactory
 *
 * @package Arrow\Observer\Service
 */
class ObserverManagerFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        /**
         * @var ConfigManagerInterface $configManager
         */
        $configManager = $serviceLocator->get('config-manager');

        $observerManager = new ObserverManager();

        $observerManager->setObservers($configManager->get('observers'));

        return $observerManager;
    }

}