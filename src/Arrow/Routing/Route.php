<?php

namespace Arrow\Routing;

/**
 * Class Route
 *
 * @package Arrow\Routing
 */
class Route implements RouteInterface
{

    /**
     * Route name
     *
     * @var string
     */
    protected $name;

    /**
     * HTTP method
     *
     * @var string
     */
    protected $method;

    /**
     * Request URI
     *
     * @var string
     */
    protected $uri;

    /**
     * Route params
     *
     * @var array
     */
    protected $params = [];

    /**
     * Route params values
     *
     * @var array
     */
    protected $values = [];

    /**
     * @inheritdoc
     */
    public function setName($name)
    {

        $this->name = $name;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getName()
    {

        return $this->name;

    }

    /**
     * @inheritdoc
     */
    public function setMethod($method)
    {

        $this->method = $method;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getMethod()
    {

        return $this->method;

    }

    /**
     * @inheritdoc
     */
    public function setUri($uri)
    {

        $this->uri = $uri;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getUri()
    {

        return $this->uri;

    }

    /**
     * @inheritdoc
     */
    public function setParams(array $params)
    {

        $this->params = $params;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getParams()
    {

        return $this->params;

    }

    /**
     * @inheritdoc
     */
    public function getParam($paramName, $default = null)
    {

        return isset($this->values[$paramName]) ? $this->values[$paramName] : $default;

    }

    /**
     * @inheritdoc
     */
    public function setParam($paramName, $value)
    {

        $this->values[$paramName] = $value;

        return $this;

    }

}