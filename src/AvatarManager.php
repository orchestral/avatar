<?php

namespace Orchestra\Avatar;

use Illuminate\Support\Arr;
use Illuminate\Support\Manager;
use Orchestra\Avatar\Handlers\Gravatar;

class AvatarManager extends Manager
{
    /**
     * Configuration values.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Get Gravatar driver.
     *
     * @return \Orchestra\Avatar\Provider
     */
    protected function createGravatarDriver(): Provider
    {
        $config = $this->getConfiguration();

        return new Provider(new Gravatar($config));
    }

    /**
     * Get default driver.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->config['driver'] ?? 'gravatar';
    }

    /**
     * Set the default driver.
     *
     * @param  string  $name
     *
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->config['driver'] = $name;
    }

    /**
     * Get configuration values.
     *
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Set configuration.
     *
     * @param  array  $config
     *
     * @return $this
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get avatar configuration.
     *
     * @return array
     */
    protected function getConfiguration(): array
    {
        return Arr::except($this->config, 'driver');
    }
}
