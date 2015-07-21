<?php

namespace Arrow\Http\Request\Strategy;

/**
 * Class Get
 *
 * @package Arrow\Http\Request\Strategy
 */
class Get implements RequestStrategyInterface
{

    /**
     * @inheritdoc
     */
    public function getData()
    {

        return $_GET;

    }

}