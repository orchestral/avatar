<?php namespace Orchestra\Avatar;

use Illuminate\Support\Manager;

class AvatarManager extends Manager
{
    /**
     * Get Gravatar driver.
     *
     * @return Provider
     */
    protected function createGravatarDriver()
    {
        $config = $this->getConfiguration();

        return new Provider(new GravatarHandler($config));
    }

    /**
     * Get default driver.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']->get('orchestra/avatar::driver', 'gravatar');
    }

    /**
     * Get avatar configuration.
     *
     * @return array
     */
    protected function getConfiguration()
    {
        $config = $this->app['config']->get('orchestra/avatar::config', array());

        unset($config['driver']);

        return $config;
    }
}