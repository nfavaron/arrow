<?php

namespace Arrow\Http\Response\Content;

use Arrow\Http\Response\Exception\ResponseException;

/**
 * Class Html
 *
 * @package Arrow\Http\Response\Content
 */
class Html implements ResponseContentInterface
{

    /**
     * @var string
     */
    protected $contentType = 'text/html';

    /**
     * @var string
     */
    protected $html = '';

    /**
     * Sets the html content
     *
     * @param string $html
     * @return $this
     * @throws ResponseException
     */
    public function setHtml($html)
    {

        if (is_string($html) === false) {
            throw new ResponseException('The response html content is not a string.');
        }

        $this->html = $html;

        return $this;

    }

    /**
     * @inheritdoc
     */
    public function getContentType()
    {

        return $this->contentType;

    }

    /**
     * @inheritdoc
     */
    public function getOutput()
    {

        return $this->html;

    }

}