<?php

namespace Arrow\Http\Response;

use Arrow\Http\Response\Content\ResponseContentInterface;

/**
 * Interface ResponseInterface
 *
 * @package Arrow\Http\Response
 */
interface ResponseInterface
{

    /**
     * Set HTTP status code
     *
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode);

    /**
     * Get HTTP stats code
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Adds a header to the response
     *
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function addHeader($name, $value);

    /**
     * Removes a header from the response
     *
     * @param string $name
     * @return $this
     */
    public function removeHeader($name);

    /**
     * Sets the content of the response
     *
     * @param ResponseContentInterface $content
     * @return $this
     */
    public function setContent(ResponseContentInterface $content);

    /**
     * Gets the content of the response.
     * Returns null if the content is not defined.
     *
     * @return ResponseContentInterface|null
     */
    public function getContent();

    /**
     * Sends the headers
     *
     * @return $this
     */
    public function sendHeaders();

    /**
     * Sends the content
     *
     * @return $this
     */
    public function sendContent();

}