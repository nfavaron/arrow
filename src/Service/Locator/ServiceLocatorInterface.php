<?php

namespace Arrow\Service\Locator;

use Arrow\Service\Exception\ServiceException;
use Arrow\Observer\ObserverManagerInterface;

/**
 * Interface ServiceLocatorInterface
 *
 * @package Arrow\Service\Locator
 */
interface ServiceLocatorInterface
{

    /**
     * Returns true if $serviceName exists in the locator's registry, else returns false.
     *
     * @param string $serviceName
     * @return bool
     */
    public function has($serviceName);

    /**
     * Add $serviceName to the locator's registry, link it to $factoryNamespace.
     * By default the service is considered as a singleton.
     *
     * @param string $serviceName
     * @param string $factoryNamespace
     * @param bool   $isSingleton
     * @return $this
     * @throws ServiceException
     */
    public function add($serviceName, $factoryNamespace, $isSingleton = true);

    /**
     * Returns the instance identified by $serviceName.
     * Throws an exception if the service does not exist.
     *
     * @param string $serviceName
     * @return mixed
     * @throws ServiceException
     */
    public function get($serviceName);

    /**
     * @param ObserverManagerInterface $observerManager
     * @return $this
     */
    public function setObserverManager(ObserverManagerInterface $observerManager);

    /**
     * @return ObserverManagerInterface
     * @throws ServiceException
     */
    public function getObserverManager();

}