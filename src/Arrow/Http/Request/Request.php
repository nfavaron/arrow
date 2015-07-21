<?php

namespace Arrow\Http\Request;

use Arrow\Http\Request\Strategy\RequestStrategyInterface;
use Arrow\Http\Request\Exception\RequestException;

/**
 * Class Request
 *
 * @package Arrow\Http\Request
 */
class Request implements RequestInterface
{

    /**
     * @var RequestStrategyInterface
     */
    protected $strategy;

    /**
     * @var array
     */
    protected $data;

    /**
     * @inheritdoc
     */
    public function getMethod()
    {

        return $_SERVER['REQUEST_METHOD'];

    }

    /**
     * @inheritdoc
     */
    public function getURI()
    {

        return $_SERVER['REQUEST_URI'];

    }

    /**
     * @inheritdoc
     */
    public function getQuery()
    {

        return $_SERVER['QUERY_STRING'];

    }

    /**
     * @inheritdoc
     */
    public function getFiles()
    {

        return $_FILES;

    }

    /**
     * @inheritdoc
     */
    public function getData()
    {

        if ($this->data === null) {

            $this->data = $this->getStrategy()->getData();

        }

        return $this->data;

    }

    /**
     * @inheritdoc
     */
    public function setStrategy(RequestStrategyInterface $strategy)
    {

        $this->strategy = $strategy;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getStrategy()
    {

        if (empty($this->strategy)) {
            throw new RequestException('The strategy is not defined.');
        }

        return $this->strategy;

    }

}