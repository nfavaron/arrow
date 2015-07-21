<?php

namespace Arrow\Http\Request\Strategy;

/**
 * Class Patch
 *
 * @package Arrow\Http\Request\Strategy
 */
class Patch implements RequestStrategyInterface
{

    /**
     * @inheritdoc
     */
    public function getData()
    {

        return file_get_contents('php://input');

    }

}