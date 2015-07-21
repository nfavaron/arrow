<?php

namespace Arrow\Http\Request;

use Arrow\Http\Request\Exception\RequestException;

/**
 * Interface RequestAwareInterface
 *
 * @package Arrow\Http\Request
 */
interface RequestAwareInterface
{

    /**
     * @param RequestInterface $response
     * @return $this
     */
    public function setRequest(RequestInterface $response);

    /**
     * @return RequestInterface
     * @throws RequestException
     */
    public function getRequest();

}