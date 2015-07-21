<?php

namespace Arrow\Http\Response\Content;

use Arrow\Http\Response\Exception\ResponseException;

/**
 * Class Text
 *
 * @package Arrow\Http\Response\Content
 */
class Text implements ResponseContentInterface
{

    /**
     * @var string
     */
    protected $contentType = 'text/plain';

    /**
     * @var string
     */
    protected $text = '';

    /**
     * Sets the text content
     *
     * @param string $text
     * @return $this
     * @throws ResponseException
     */
    public function setText($text)
    {

        if (is_string($text) === false) {
            throw new ResponseException('The response text content is not a string.');
        }

        $this->text = $text;

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

        return $this->text;

    }

}