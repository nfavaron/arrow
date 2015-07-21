<?php

namespace Arrow\Http\Request;

use Arrow\Http\Request\Strategy\RequestStrategyInterface;
use Arrow\Http\Request\Exception\RequestException;

/**
 * Interface RequestInterface
 *
 * @package Arrow\Http\Request
 */
interface RequestInterface
{

    /**
     * Returns the request's method (GET, POST, PUT, PATCH, ...)
     *
     * @return string
     */
    public function getMethod();

    /**
     * Returns the request URI like "/my/api/uri"
     *
     * @return string
     */
    public function getURI();

    /**
     * Returns the request query string like "?name=bob&id=1337"
     *
     * @return string
     */
    public function getQuery();

    /**
     * Returns an array of data sent.
     * This function relies on the RequestStrategyInterface to handle
     * the different methods like GET, POST, etc.
     *
     * @return array
     */
    public function getData();

    /**
     * Returns an array of uploaded files
     *
     * @return array
     */
    public function getFiles();

    /**
     * Sets the request strategy (GET, POST, ...)
     *
     * @param RequestStrategyInterface $strategy
     * @return $this
     */
    public function setStrategy(RequestStrategyInterface $strategy);

    /**
     * Gets the request strategy
     *
     * @return RequestStrategyInterface
     * @throws RequestException
     */
    public function getStrategy();

}