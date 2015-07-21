<?php

namespace Arrow\Http\Request\Strategy;

/**
 * Class Post
 *
 * @package Arrow\Http\Request\Strategy
 */
class Post implements RequestStrategyInterface
{

    /**
     * @inheritdoc
     */
    public function getData()
    {

        return $_POST;

    }

}