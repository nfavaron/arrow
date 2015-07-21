<?php

namespace Arrow\Config\Compiler\Strategy;

/**
 * Class Merge
 *
 * @package Arrow\Config\Compiler\Strategy
 */
class Merge extends CompilerStrategyAbstract
{

    /**
     * @inheritdoc
     */
    public function compile(array &$applicationConfig, $moduleName, $moduleConfig)
    {

        $applicationConfig[$this->name] = array_merge_recursive($applicationConfig[$this->name], $moduleConfig);

    }

}