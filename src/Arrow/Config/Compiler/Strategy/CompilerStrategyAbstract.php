<?php

namespace Arrow\Config\Compiler\Strategy;

/**
 * Class CompilerStrategyAbstract
 *
 * @package Arrow\Config\Compiler\Strategy
 */
abstract class CompilerStrategyAbstract implements CompilerStrategyInterface
{

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}