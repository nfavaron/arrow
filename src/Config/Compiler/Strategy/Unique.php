<?php

namespace Arrow\Config\Compiler\Strategy;

use Arrow\Config\Compiler\Exception\CompilerException;

/**
 * Class Unique
 *
 * @package Arrow\Config\Compiler\Strategy
 */
class Unique extends CompilerStrategyAbstract
{

    /**
     * @inheritdoc
     */
    public function compile(array &$applicationConfig, $moduleName, $moduleConfig)
    {

        // For each configuration key
        foreach ($moduleConfig as $key => $value) {

            // Configuration key already set
            if (isset($applicationConfig[$this->name][$key])) {

                throw new CompilerException(sprintf(
                    'The config key ["%s"]["%s"] is already defined.',
                    $this->name,
                    $key
                ));

            }

            // Set the configuration
            $applicationConfig[$this->name][$key] = $value;

        }

    }

}