<?php

namespace Arrow\Config\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Config\ConfigManager;

/**
 * Class ConfigManagerFactory
 *
 * @package Arrow\Config\Service
 */
class ConfigManagerFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new ConfigManager();

    }

}