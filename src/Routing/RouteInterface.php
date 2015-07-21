<?php

namespace Arrow\Routing;

/**
 * Interface RouteInterface
 *
 * @package Arrow\Routing
 */
interface RouteInterface
{

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $method
     * @return $this
     */
    public function setMethod($method);

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string $uri
     * @return $this
     */
    public function setUri($uri);

    /**
     * @return string
     */
    public function getUri();

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params);

    /**
     * @return array
     */
    public function getParams();

    /**
     * Gets the route param $paramName value. If not set, returns $default.
     *
     * @param string     $paramName
     * @param null|mixed $default
     * @return null|mixed
     */
    public function getParam($paramName, $default = null);

    /**
     * Sets the route $paramName value with $value
     *
     * @param string $paramName
     * @param mixed  $value
     * @return $this
     */
    public function setParam($paramName, $value);

}