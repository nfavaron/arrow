<?php

namespace Arrow\Http\Request\Strategy;

/**
 * Class Put
 *
 * @package Arrow\Http\Request\Strategy
 */
class Put implements RequestStrategyInterface
{

    /**
     * @inheritdoc
     */
    public function getData()
    {

        return file_get_contents('php://input');

    }

}