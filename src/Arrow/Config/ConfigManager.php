<?php

namespace Arrow\Config;

use Arrow\Config\Exception\ConfigException;

/**
 * Class ConfigManager
 *
 * @package Arrow\Config
 */
class ConfigManager implements ConfigManagerInterface
{

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @inheritdoc
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function get($configType)
    {

        // Config type does not exist
        if (!isset($this->config[$configType])) {

            throw new ConfigException(sprintf(
                'The configuration type "%s" is not set.',
                $configType
            ));

        }

        return $this->config[$configType];

    }

}