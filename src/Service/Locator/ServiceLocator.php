<?php

namespace Arrow\Service\Locator;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Exception\ServiceException;
use Arrow\Observer\ObserverManagerInterface;
use Arrow\Event\Manager\EventManagerAwareInterface;

/**
 * Class ServiceLocator
 *
 * @package Arrow\Service
 */
class ServiceLocator implements ServiceLocatorInterface
{

    /**
     * Associative array of service definitions
     *
     * @var array
     */
    protected $registry = [];

    /**
     * Associative array of instances
     *
     * @var array
     */
    protected $instance = [];

    /**
     * Observer manager
     *
     * @var ObserverManagerInterface
     */
    protected $observerManager;

    /**
     * @inheritdoc
     */
    public function setObserverManager(ObserverManagerInterface $observerManager)
    {

        $this->observerManager = $observerManager;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getObserverManager()
    {

        if($this->observerManager instanceof ObserverManagerInterface === false) {

            throw new ServiceException('The observer manager is not defined.');

        }

        return $this->observerManager;

    }

    /**
     * @inheritdoc
     */
    public function has($serviceName)
    {

        return isset($this->registry[$serviceName]);

    }

    /**
     * @inheritdoc
     */
    public function add($serviceName, $factoryNamespace, $isSingleton = true)
    {

        // Make sure service name is unique
        if (isset($this->registry[$serviceName])) {

            throw new ServiceException(sprintf(
                'The service "%s" already exists.',
                $serviceName
            ));
        }

        // Add service to the registry
        $this->registry[$serviceName] = [
            'factory'   => $factoryNamespace,
            'singleton' => $isSingleton
        ];

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function get($serviceName)
    {

        // Make sure the service exists
        if ($this->has($serviceName) === false) {

            throw new ServiceException(sprintf(
                'The service "%s" does not exist.',
                $serviceName
            ));

        }

        // Instance not stored
        if (empty($this->instance[$serviceName])) {

            /**
             * @var FactoryInterface $factory
             * @var mixed            $instance
             */
            $factory  = $this->registry[$serviceName]['factory'];
            $instance = $factory::create($this);

            // Instance has event manager
            if ($instance instanceof EventManagerAwareInterface) {

                // Attach observers
                $this
                    ->getObserverManager()
                    ->attachObservers($serviceName, $instance);

            }

            // Keep singleton instance
            if ($this->registry[$serviceName]['singleton'] === true) {

                $this->instance[$serviceName] = $instance;

            }

            // Instance stored
        } else {

            $instance = $this->instance[$serviceName];

        }

        return $instance;

    }

}