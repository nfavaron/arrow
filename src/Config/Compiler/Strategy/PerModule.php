<?php

namespace Arrow\Config\Compiler\Strategy;

use Arrow\Config\Compiler\Exception\CompilerException;

/**
 * Class PerModule
 *
 * @package Arrow\Config\Compiler\Strategy
 */
class PerModule extends CompilerStrategyAbstract
{

    /**
     * @inheritdoc
     */
    public function compile(array &$applicationConfig, $moduleName, $moduleConfig)
    {

        // Force lowercase
        $moduleName = strtolower($moduleName);

        // Configuration module already set
        if (isset($applicationConfig[$this->name][$moduleName])) {

            throw new CompilerException(sprintf(
                'The config key ["%s"]["%s"] is already defined.',
                $this->name,
                $moduleName
            ));

        }

        $applicationConfig[$this->name][$moduleName] = $moduleConfig;

    }

}