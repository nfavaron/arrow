<?php

namespace Arrow\Application;

use Arrow\Routing\RouterInterface;
use Arrow\Application\Exception\ApplicationException;

/**
 * Interface ApplicationInterface
 *
 * @package Arrow\Application
 */
interface ApplicationInterface
{

    /**
     * @param RouterInterface $router
     * @return $this
     */
    public function setRouter(RouterInterface $router);

    /**
     * @return RouterInterface
     * @throws ApplicationException
     */
    public function getRouter();

}