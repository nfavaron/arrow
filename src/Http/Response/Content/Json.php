<?php

namespace Arrow\Http\Response\Content;

use Arrow\Http\Response\Exception\ResponseException;

/**
 * Class Json
 *
 * @package Arrow\Http\Response\Content
 */
class Json implements ResponseContentInterface
{

    /**
     * @var string
     */
    protected $contentType = 'application/json';

    /**
     * @var array
     */
    protected $json = [];

    /**
     * Sets the json content
     *
     * @param array $json
     * @return $this
     * @throws ResponseException
     */
    public function setJson(array $json)
    {

        if (is_array($json) === false) {
            throw new ResponseException('The response json content is not an array.');
        }

        $this->json = $json;

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

        return json_encode($this->json, JSON_UNESCAPED_SLASHES);

    }

}