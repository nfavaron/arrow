<?php

namespace Arrow\Http\Response;

use Arrow\Http\Response\Exception\ResponseException;

/**
 * Interface ResponseAwareInterface
 *
 * @package Arrow\Http\Response
 */
interface ResponseAwareInterface
{

    /**
     * @param ResponseInterface $response
     * @return $this
     */
    public function setResponse(ResponseInterface $response);

    /**
     * @return ResponseInterface
     * @throws ResponseException
     */
    public function getResponse();

}