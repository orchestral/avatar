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
    protected function createGravatarDriver(): Provider
    {
        return new Provider(new Gravatar(
            Arr::except($this->configurations, 'driver')
        ));
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
