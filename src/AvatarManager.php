<?php

namespace Orchestra\Avatar;

use Illuminate\Support\Arr;
use Illuminate\Support\Manager;
use Orchestra\Avatar\Handlers\Gravatar;
use Orchestra\Support\Concerns\WithConfiguration;

class AvatarManager extends Manager
{
    use WithConfiguration;

    /**
     * Get Gravatar driver.
     */
    protected function createAdorableDriver(): Provider
    {
        return $this->createProvider(new Handlers\Adorable(
            Arr::except($this->configurations, 'driver')
        ));
    }

    /**
     * Get Gravatar driver.
     */
    protected function createGravatarDriver(): Provider
    {
        return $this->createProvider(new Handlers\Gravatar(
            Arr::except($this->configurations, 'driver')
        ));
    }

    /**
     * Create provider for Handler.
     */
    protected function createProvider(Handler $handler): Provider
    {
        return new Provider($handler);
    }

    /**
     * Get default driver.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->configurations['driver'] ?? 'gravatar';
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
        $this->configurations['driver'] = $name;
    }
}
