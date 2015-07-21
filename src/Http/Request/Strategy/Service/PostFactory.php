<?php

namespace Arrow\Http\Request\Strategy\Service;

use Arrow\Service\FactoryInterface;
use Arrow\Service\Locator\ServiceLocatorInterface;
use Arrow\Http\Request\Strategy\Post;

/**
 * Class PostFactory
 *
 * @package Arrow\Http\Request\Strategy\Service
 */
class PostFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    static public function create(ServiceLocatorInterface $serviceLocator)
    {

        return new Post();

    }

}