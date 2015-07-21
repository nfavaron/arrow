<?php

namespace Arrow\Http\Request\Strategy;

/**
 * Class Delete
 *
 * @package Arrow\Http\Request\Strategy
 */
class Delete implements RequestStrategyInterface
{

    /**
     * @inheritdoc
     */
    public function getData()
    {

        return file_get_contents('php://input');

    }

}