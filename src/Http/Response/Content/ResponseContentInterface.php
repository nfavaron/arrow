<?php

namespace Arrow\Http\Response\Content;

/**
 * Interface ResponseContentInterface
 *
 * @package Arrow\Http\Response\Content
 */
interface ResponseContentInterface
{

    /**
     * Returns the value of the content-type header to send
     *
     * @return string
     */
    public function getContentType();

    /**
     * Returns the output to be sent in the response
     *
     * @return string
     */
    public function getOutput();

}