<?php

namespace Arrow\Http\Response;

use Arrow\Http\Response\Exception\ResponseException;

/**
 * Interface ResponseAwareInterface
 *
 * @package Arrow\Http\Response
 */
trait ResponseAwareTrait
{

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @inheritdoc
     */
    public function setResponse(ResponseInterface $response)
    {

        $this->response = $response;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getResponse()
    {

        if ($this->response instanceof ResponseInterface === false) {

            throw new ResponseException('The response is not defined.');

        }

        return $this->response;

    }

}