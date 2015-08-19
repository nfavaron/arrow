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
     * Sets the response's header $name & $value
     *
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function setHeader($name, $value);

    /**
     * Removes the response's header $name
     *
     * @param string $name
     * @return $this
     */
    public function removeHeader($name);

    /**
     * Sets the response's content
     *
     * @param ResponseContentInterface $content
     * @return $this
     */
    public function setContent(ResponseContentInterface $content);

    /**
     * Gets the response's content
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