<?php

namespace Arrow\Config\Compiler;

use Arrow\Config\Compiler\Exception\CompilerException;
use Arrow\Config\Compiler\Strategy\CompilerStrategyInterface;

/**
 * Class Compiler
 *
 * This class should only be used in development environment.
 *
 * @package Arrow\Config
 */
class Compiler
{

    /**
     * List of CompilerStrategyInterface identified by name
     *
     * @var array
     */
    protected $strategy = [];

    /**
     * Add the $strategy
     *
     * @param CompilerStrategyInterface $strategy
     * @return $this
     */
    public function addStrategy(CompilerStrategyInterface $strategy)
    {
        $this->strategy[] = $strategy;

        return $this;
    }

    /**
     * Compiles all the configuration files found in $modulesPath sub-folders
     * into one config file stored at $configPath.
     *
     * @param string $modulesPath Modules folder path
     * @param string $configPath  Output file
     * @return $this
     * @throws CompilerException
     */
    public function build($modulesPath, $configPath)
    {

        $applicationConfig = [];
        $moduleNames       = scandir($modulesPath);

        // For each module
        foreach ($moduleNames as $moduleName) {

            $modulePath = sprintf('%s/%s', $modulesPath, $moduleName);

            if (
                is_dir($modulePath)
                && $moduleName != '.' && $moduleName != '..'
            ) {

                /**
                 * For each strategy
                 *
                 * @var CompilerStrategyInterface $strategy
                 */
                foreach ($this->strategy as $strategy) {

                    $strategyName = $strategy->getName();
                    $filePath     = sprintf(
                        '%s/%s.php',
                        $modulePath,
                        $strategyName
                    );

                    // Configuration file exists
                    if (file_exists($filePath)) {

                        // Configuration key not set
                        if (!isset($applicationConfig[$strategyName])) {
                            $applicationConfig[$strategyName] = [];
                        }

                        // Compile configuration
                        $strategy->compile(
                            $applicationConfig,
                            $moduleName,
                            require_once $filePath
                        );

                    }

                }

            }

        }

        // Output file not writable
        if (is_writable($configPath) === false) {
            throw new CompilerException(sprintf(
                'The file path "%s" is not writable.',
                $configPath
            ));
        }

        // Export variable
        $applicationConfig = var_export($applicationConfig, true);

        // Prevent messing up with namespace

        // Store Configuration
        file_put_contents(
            $configPath,
            sprintf("<?php\nreturn %s;\n", $applicationConfig)
        );

        return $this;

    }

}