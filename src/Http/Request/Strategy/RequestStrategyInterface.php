<?php

namespace Arrow\Http\Request\Strategy;

/**
 * Interface RequestStrategyInterface
 *
 * @package Arrow\Http\Request\Strategy
 */
interface RequestStrategyInterface
{

    /**
     * Returns an array of method-specific (GET, POST, etc.) data sent in the request
     *
     * @return array
     */
    public function getData();

}