<?php

namespace Arrow\Config\Compiler\Strategy;

use Arrow\Config\Compiler\Exception\CompilerException;

/**
 * Interface CompilerStrategyInterface
 *
 * @package Arrow\Config\Compiler
 */
interface CompilerStrategyInterface
{

    /**
     * @param string $name
     */
    public function __construct($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * Compiles $moduleConfig into $applicationConfig
     *
     * @param array  $applicationConfig
     * @param string $moduleName
     * @param array  $moduleConfig
     * @return $this
     * @throws CompilerException
     */
    public function compile(array &$applicationConfig, $moduleName, $moduleConfig);

}