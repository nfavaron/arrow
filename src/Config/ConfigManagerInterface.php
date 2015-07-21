<?php

namespace Arrow\Config;

use Arrow\Config\Exception\ConfigException;

/**
 * Interface ConfigManagerInterface
 *
 * @package Arrow\Config
 */
interface ConfigManagerInterface
{

    /**
     * @param array $config
     * @return $this
     */
    public function setConfig(array $config);

    /**
     * Returns the config of $configType.
     *
     * @param string $configType routes|services|settings
     * @return array
     * @throws ConfigException
     */
    public function get($configType);

}