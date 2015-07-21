<?php

namespace Arrow\Http\Request;

use Arrow\Http\Request\Exception\RequestException;

/**
 * Interface RequestAwareInterface
 *
 * @package Arrow\Http\Request
 */
trait RequestAwareTrait
{

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @inheritdoc
     */
    public function setRequest(RequestInterface $request)
    {

        $this->request = $request;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getRequest()
    {

        if ($this->request instanceof RequestInterface === false) {

            throw new RequestException('The request is not defined.');

        }

        return $this->request;

    }

}